<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class PetModel extends Model
{
    protected $fillable = ['id', 'category', 'name', 'photoUrls', 'tags', 'status'];

    protected static $baseUrl = 'https://petstore.swagger.io/v2/pet';

    public static function getPetById($petId)
    {
        $response = Http::get(self::$baseUrl . "/{$petId}");
        // $petData = $response->json();
        if ($response->successful()) {
            return $response->json();
        } else {
            $statusCode = $response->status();

            if ($statusCode == 400) {
                // Obsługa błędu 400 - nieprawidłowe ID
                throw new \Exception('Invalid ID supplied');
            } elseif ($statusCode == 404) {
                // Obsługa błędu 404 - zwierzę nie znalezione
                throw new \Exception('Pet not found');
            } else {
                // Inny błąd, rzucenie ogólnego wyjątku
                throw new \Exception('Błąd zewnętrznego API: ' . $statusCode);
            }
        }
        // return $petData;
    }
    public static function addNewPet($data)
    {
        $response = Http::post(self::$baseUrl, $data);
        $newPet = $response->json();
        return $newPet;
    }
    public static function readPetDataById($petId)
    {
        $response = Http::get(self::$baseUrl . "/{$petId}");
        $petData = $response->json();
        return $petData;
    }
    public static function updatePet($petId, $data)
    {
        $response = Http::put(self::$baseUrl . "/{$petId}", $data);
        $updatedPet = $response->json();
        return $updatedPet;
    }
    public static function deletePet($petId)
    {
        $response = Http::delete(self::$baseUrl . "/{$petId}");
        $deletedPet = $response->json();
        return $deletedPet;
    }
}
