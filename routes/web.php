<?php

use App\Http\Controllers\PetApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PetApiController::class, 'index']);
Route::get('/pets', [PetApiController::class, 'getPetById']);

Route::post('/addPets', [PetApiController::class, 'addNewPet']);

Route::get('/updatePetsDetails', [PetApiController::class, 'readPetDataForUpdate']);
Route::post('/updatePets', [PetApiController::class, 'updatePet']);

Route::post('/deletePet', [PetApiController::class, 'deletePet']);
