<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyController;


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocationController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/countries', [CountryController::class, 'index']);
    Route::get('/states/{countryId}', [StateController::class, 'statesByCountry']);
    Route::get('/cities/{stateId}', [CityController::class, 'citiesByState']);
    Route::post('/company', [CompanyController::class, 'store'])->name('company');
    

    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    Route::post('/company', [CompanyController::class, 'store'])->name('company');
    Route::get('/viewcompany', [CompanyController::class, 'show'])->name('viewcompany');

    
Route::get('/company/delete/{id}', [CompanyController::class,'destroy'
])->name('company/delete/{id}');


Route::get('/company/edit/{id}', [CompanyController::class,'edit'
])->name('company/edit/{id}');
Route::post('/company/update/{id}', [CompanyController::class,'update'
])->name('company/update/{id}');


});

require __DIR__.'/auth.php';
