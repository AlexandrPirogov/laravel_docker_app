<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});

Route::post('/create-account', [App\Http\Controllers\ManagerController::class, 'createAccount']);

Route::get('/login', function (Request $request) {
    return view('/login');
})->name('login');

Route::post('/signin', [App\Http\Controllers\ManagerController::class, 'signin']);
//using middleware
Route::group(['middleware' => ['auth']], function () {
    Route::get('/me', [App\Http\Controllers\ManagerController::class, 'me'])->name('me.manager');
    Route::prefix('me')->group(function () {
        Route::get('/signout', [App\Http\Controllers\ManagerController::class, 'logout']);

        Route::controller(App\Http\Controllers\ManagerController::class)->group(function () {
            Route::get('/profile', [App\Http\Controllers\ManagerController::class, 'profile'])->name('profile');
            Route::get('/vehicles', 'vehicles')->name('me.vehicles');
            Route::post('/vehicles', [App\Http\Controllers\VehicleController::class, 'store'])->name('web.vehicles.store');
            Route::get('/createvehicle', [App\Http\Controllers\VehicleController::class, 'viewStore'])->name('web.vehicles.store.view');
            
            Route::put('/vehicles/{vehicle}', [App\Http\Controllers\VehicleController::class, 'update'])->name('web.vehicles.update');
            Route::get('/vehicles/{vehicle}', [App\Http\Controllers\VehicleController::class, 'viewUpdate'])->name('web.vehicles.update.view');

            Route::delete('/vehicles/{vehicle}', [App\Http\Controllers\VehicleController::class, 'destroy'])->name('web.vehicles.destroy');

            Route::get('/enterprises',  [App\Http\Controllers\ManagerController::class, 'enterprises'])->name('me.enterprises');
            Route::get('/enterprises/{enterprise}/vehicles',  [App\Http\Controllers\EnterpriseController::class, 'vehicles'])->name('me.enterprise.vehicles');
        });
    });
});

Route::controller(App\Http\Controllers\BrandController::class)->group(function () {
    Route::get('/brands', 'index')->name('web.brands.index');
    Route::get('/brands/{brand}', 'show')->name('web.brands.show');

    Route::delete('/brands/{brand}', 'destroy')->name('web.brands.destroy');
    Route::put('/brands/{brand}', 'update')->name('web.brands.update');
    
    Route::post('/brands', 'store')->name('web.brands.store');
});

Route::controller(App\Http\Controllers\VehicleController::class)->group(function () {
 /*   Route::get('/vehicles', 'index')->name('vehicles');
    Route::get('/vehicles/assignlist', 'assignList')->name('vehicles.assignList');
    Route::get('/vehicles/{vehicle}', 'show')->name('vehicles.show');
    Route::post('/vehicles', 'store')->name('vehicles.store');
    Route::put('/vehicles/{vehicle}', 'update')->name('vehicles.update');
    Route::delete('/vehicles/{vehicle}', 'destroy')->name('vehicles.destroy');*/
});

Route::controller(App\Http\Controllers\EnterpriseController::class)->group(function () {
    Route::get('/enterprises', 'index')->name('web.enterprises.index');
    Route::get('/enterprises/{enterprise}', 'show')->name('web.enterprises.show');
    Route::get('/enterprises/{enterprise}/drivers', 'showdrivers')->name('web.enterprises.showdrivers');
});

Route::controller(App\Http\Controllers\DriverController::class)->group(function () {
    Route::get('/drivers', 'index')->name('web.drivers.index');
});

Route::controller(App\Http\Controllers\AssignListController::class)->group(function () {
    Route::get('/assignlists', 'index')->name('web.assignlists.index');
    Route::get('/assignlists/drivers', 'drivers')->name('web.assignlists.drivers');
    Route::get('/assignlists/vehicles', 'vehicles')->name('web.assignlists.vehicles');
    Route::get('/assignlists/complete', 'completeIndex')->name('web.assignlists.completeIndex');
});


Route::controller(App\Http\Controllers\WorkingListController::class)->group(function () {
    Route::get('/working', 'index')->name('web.working.index');
});