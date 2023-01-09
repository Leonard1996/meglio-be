<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\CommunalTerritoryController;
use App\Http\Controllers\CommunalTerritoryDetailController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\GeographicLocationController;
use App\Http\Controllers\QuoteProfessionController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ServiceModelController;
use App\Http\Controllers\VehicleBodyTypeController;
use App\Http\Controllers\VehicleCategoryController;
use App\Http\Controllers\VehicleFuelController;
use App\Http\Controllers\VehicleMakeController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\VehicleVersionController;
use App\Http\Controllers\DataPrivacyController;
use Illuminate\Support\Facades\Route;

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

// CMS - ROUTES MOVED TO ANOTHER SEPARETE SERVICE


// BROKER AUTHORIZED ONLY ROUTES
Route::group(['prefix'=>'broker'], function(){
    // DATA - FROM DATA - RESURCE API's
    Route::apiResource('communal-territory-details', CommunalTerritoryDetailController::class);
    Route::apiResource('communal-territories', CommunalTerritoryController::class);
    Route::apiResource('communes', CommuneController::class);
    Route::apiResource('geographic-locations', GeographicLocationController::class);
    Route::apiResource('regions', RegionController::class);
    Route::apiResource('vehicle-body-types', VehicleBodyTypeController::class);
    Route::apiResource('vehicle-categories', VehicleCategoryController::class);
    Route::apiResource('vehicle-fuels', VehicleFuelController::class);
    Route::apiResource('vehicle-makes', VehicleMakeController::class);
    Route::apiResource('vehicle-models', VehicleModelController::class);
    Route::apiResource('vehicle-versions', VehicleVersionController::class);
    Route::apiResource('data-privacy', DataPrivacyController::class);
    Route::get('service-models',  [ServiceModelController::class, 'index']);
    Route::get('quotes/vehicle/{requestToken}', [QuoteController::class, 'getQuotes'])->name('getVehicleQuotes');
    // CORE API's
    Route::post('request/quote', [QuoteController::class, 'requestQuotation'])->name('request-quote');
    Route::post('request/{quotation}/quotation_data/{quotation_data}/save', [QuoteController::class, 'saveQuotation'])->name('save-quote');
});



// TESTING API's
Route::get('qoutation/new', [QuoteController::class, 'new_qoutation']);
Route::get('qoutation/saved', [QuoteController::class, 'saved_qoutation']);
Route::get('qoutation/sold', [QuoteController::class, 'sold_qoutation']);
