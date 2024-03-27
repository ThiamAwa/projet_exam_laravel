<?php

use App\Http\Controllers\DashbordController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    if(Auth::id()){
        $usertype=Auth()->user()->usertype;

        if($usertype==='admin'){
          return view('admin');


        }else if($usertype=='user'){
          return view('layouts.welcomUser');
        }else{
          return view('welcome');
        }
      }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Location
// Route::get('/Location', [LocationController::class, 'index'])->name('voirVehicule');


//chaffeur

Route::resource('/Chauffeur',\App\Http\Controllers\ChauffeurController::class);
Route::resource('/Vehicule',\App\Http\Controllers\VehiculeController::class);

Route::resource('/Tarification',\App\Http\Controllers\TarificationController::class);
Route::resource('/Location',LocationController::class);
Route::post('/submit', [LocationController::class, 'submit'])->name('submit');

// Route::put('/Location/{id}', 'LocationController@update')->name('Location.update');
// Route::post('/submit', 'LocationController@updateLocation')->name('submit');



Route::resource('/Home',App\Http\Controllers\homeController::class);



require __DIR__.'/auth.php';
