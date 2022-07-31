<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputtypeController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\StockController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {

    Route::middleware('regular')->group(function () {
            //input types 
            Route::get('/input-types', [InputtypeController::class, 'index']);
            Route::get('/input-types/create', [InputtypeController::class, 'create']);
            Route::post('/input-types/store', [InputtypeController::class, 'store']);
            Route::get('/input-types/show/{id}', [InputtypeController::class, 'show']);
            //input
            Route::get('/inputs/{id}', [InputController::class, 'index']);
            Route::get('/inputs/create/{id}', [InputController::class, 'create']);
            Route::post('/inputs/store', [InputController::class, 'store']);
            Route::get('/inputs/show/{id}', [InputController::class, 'show']);
            //Record
            Route::get('/records', [RecordController::class, 'index']);
            Route::get('/records/create/', [RecordController::class, 'create']);
            Route::post('/records/store', [RecordController::class, 'store']);
            Route::get('/records/show/{id}', [RecordController::class, 'show']);
            Route::get('/records/getTypes/{id}', [RecordController::class, 'getTypes']);  
            //stock
            Route::get('/stocks/create/{id}',[StockController::class, 'create']);  
    });

    Route::middleware('admin')->group(function () {
        

    });
});