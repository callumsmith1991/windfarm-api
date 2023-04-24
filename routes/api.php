<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WindFarmController;
use App\Http\Controllers\WindFarmTurbineController;
use App\Http\Controllers\WindFarmInspectionsController;
use App\Http\Controllers\WindFarmTurbineInspectionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(WindFarmController::class)->group(function () {
    Route::get('windfarm', 'index');
    Route::get('windfarm/{id}', 'show');
    Route::get('windfarm/{id}/turbines', 'getTurbines');
});

Route::controller(WindFarmTurbineController::class)->group(function () {
    Route::get('turbines', 'index');
    Route::get('turbines/{id}', 'show');
    Route::get('turbines/{id}/components', 'getTurbineComponents');
});

Route::controller(WindFarmInspectionsController::class)->group(function () {
    Route::get('inspections', 'index');
    Route::get('inspections/{id}', 'show');
    Route::get('inspections/{id}/turbines-inspections', 'getTurbinesInspections');
});

Route::controller(WindFarmTurbineInspectionController::class)->group(function () {
    Route::get('turbine-inspections', 'index');
    Route::get('turbine-inspections/{id}', 'show');
    Route::get('turbine-inspections/{id}/component-inspection', 'getComponentInspections');
    Route::get('turbine-inspections/{tiid}/component-inspection/{ciid}', 'getComponentInspection');
});

Route::fallback(function () {
    return response()->json([
        'status' => false,
        'message' => 'Route not found.'
    ], 404);
});
