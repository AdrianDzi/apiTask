<?php

namespace App\Http\Controllers;

use App\Models\PetModel;
use Illuminate\Http\Request;

class PetApiController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function getPetById(Request $request)
    {
        $petId = $request->petId;
        try {
            $petData = PetModel::getPetById($petId);
            $petData = json_encode($petData);
            return view('showPet', compact('petData'))->render();
        } catch (\Exception $e) {
            $errorMessage = '';
            if ($e->getMessage() == 'Invalid ID supplied') {
                $errorMessage = 'Invalid ID supplied';
            } elseif ($e->getMessage() == 'Pet not found') {
                $errorMessage = 'Pet not found';
            } else {
                $errorMessage = 'Wystąpił błąd.';
            }
            $petData = json_encode(['error' => $errorMessage]);
            return view('showPet', compact('petData'))->render();
        }
    }
    public function deletePet(Request $request)
    {
        $petId = $request->petId;
        try {
            PetModel::deletePet($petId);

            $petData = "Correctly deleted pet";
            return view('showPet', compact('petData'))->render();
        } catch (\Exception $e) {
            $errorMessage = '';

            if ($e->getMessage() == 'Invalid ID supplied') {
                $errorMessage = 'Invalid ID supplied';
            } elseif ($e->getMessage() == 'Pet not found') {
                $errorMessage = 'Pet not found';
            } else {
                $errorMessage = 'Wystąpił błąd.';
            }

            $petData = json_encode(['error' => $errorMessage]);
            return view('showPet', compact('petData'))->render();
        }
    }

    public function addNewPet(Request $request)
    {
        $data = [
            'category' => [
                'id' => $request->data['newCatId'],
                'name' => $request->data['newCatName'],
            ],
            'name' => $request->data['newPetName'],
            'photoUrls' => [$request->data['newPhotoUrl']],
            'tags' => [
                [
                    'id ' => $request->data['newTagId'],
                    'name' => $request->data['newTagName'],
                ]
            ],
            'status' => $request->data['newStatus'],
        ];
        $newPet = PetModel::addNewPet($data);
        $newPet = json_encode($newPet);
        return view('showPet', compact('newPet'))->render();
    }
    public function readPetDataForUpdate(Request $request)
    {
        $petId = $request->petId;
        $petData = PetModel::readPetDataById($petId);
        return view('updatePetForm', compact('petData', 'petId'))->render();
    }
    public function updatePet(Request $request)
    {
        $petId = $request->petId;
        $data = [
            'id' => $request->petId,
            'category' => [
                'id' => $request->data['catId'],
                'name' => $request->data['catName'],
            ],
            'name' => $request->data['petName'],
            'photoUrls' => [$request->data['photoUrl']],
            'tags' => [
                [
                    'id ' => $request->data['tagsId'],
                    'name' => $request->data['tagsName'],
                ]
            ],
            'status' => $request->data['status'],
        ];
        PetModel::updatePet($petId, $data);
        return redirect()->back()->with('success', 'succesfully deleted pet');
    }
}
