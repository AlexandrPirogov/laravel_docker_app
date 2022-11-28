<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});

Route::post('/create-account', [App\Http\Controllers\Api\ManagerApiController::class, 'createAccount']);

Route::post('/signin', [App\Http\Controllers\Api\ManagerApiController::class, 'signin']);
//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::prefix('me')->group(function () {
        Route::post('/sign-out', [App\Http\Controllers\Api\ManagerApiController::class, 'logout']);

        Route::controller(App\Http\Controllers\Api\ManagerApiController::class)->group(function () {
            Route::get('/profile', function(Request $request) {return auth()->user();});
            Route::get('/enterprises', 'enterprises')->name('manager.me.enterprises');
            Route::get('/vehicles', 'vehicles')->name('manager.me.vehicles');
            Route::post('/vehicles', [App\Http\Controllers\Api\ManagerApiController::class, 'vehiclesCreate']);
            Route::put('/vehicles/{vehicle}', [App\Http\Controllers\Api\ManagerApiController::class, 'vehiclesUpdate'])->name('api.vehicles.udpate');
            Route::delete('/vehicles/{vehicle}', [App\Http\Controllers\Api\ManagerApiController::class, 'vehiclesDelete']);
        });
    });
});

Route::controller(App\Http\Controllers\Api\BrandApiController::class)->group(function () {
    Route::get('/brands', 'index')->name('brands.index');
    Route::get('/brands/{brand}', 'show')->name('brands.show');

    Route::delete('/brands/{brand}', 'destroy')->name('brands.destroy');
    Route::put('/brands/{brand}', 'update')->name('brands.update');
    
    Route::post('/brands', 'store')->name('brands.store');
});

Route::controller(App\Http\Controllers\Api\VehicleApiController::class)->group(function () {
    Route::get('/vehicles', 'index')->name('vehicles');
    Route::get('/vehicles/assignlist', 'assignList')->name('vehicles.assignList');
    Route::get('/vehicles/{vehicle}', 'show')->name('api.vehicles.show');
    Route::post('/vehicles', 'store')->name('vehicles.store');
    Route::put('/vehicles/{vehicle}', 'update')->name('api.vehicles.update');
    Route::delete('/vehicles/{vehicle}', 'destroy')->name('vehicles.destroy');
});

Route::controller(App\Http\Controllers\Api\EnterpriseApiController::class)->group(function () {
    Route::get('/enterprises', 'index')->name('enterprises.index');
    Route::get('/enterprises/{enterprise}', 'show')->name('enterprises.show');
    Route::get('/enterprises/{enterprise}/drivers', 'showdrivers')->name('enterprises.showdrivers');
});

Route::controller(App\Http\Controllers\Api\DriverApiController::class)->group(function () {
    Route::get('/drivers', 'index')->name('drivers.index');
});

Route::controller(App\Http\Controllers\Api\AssignListApiController::class)->group(function () {
    Route::get('/assignlists', 'index')->name('assignlists.index');
    Route::get('/assignlists/drivers', 'drivers')->name('assignlists.drivers');
    Route::get('/assignlists/vehicles', 'vehicles')->name('assignlists.vehicles');
    Route::get('/assignlists/complete', 'completeIndex')->name('assignlists.completeIndex');
});


Route::controller(App\Http\Controllers\Api\WorkingListApiController::class)->group(function () {
    Route::get('/working', 'index')->name('working.index');
});