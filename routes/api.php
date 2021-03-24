<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatientController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\VaccinateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('patients', PatientController::class);
Route::resource('vaccines', VaccineController::class);

Route::resource('vaccinates', VaccinateController::class)
    ->only('index', 'store');
