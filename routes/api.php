<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ExternalBooksController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('external-books', [ExternalBooksController::class, 'externalBooks']);

Route::prefix('v1')->group(function(){

    Route::prefix('books')->name('book.')->group(function(){
        Route::get('/', [BookController::class, 'allBooks'])->name('all');
        Route::post('/', [BookController::class, 'create'])->name('create');
        Route::get('{id}', [BookController::class, 'show'])->name('show');
        Route::patch('{id}', [BookController::class, 'update'])->name('update');
        Route::delete('{id}', [BookController::class, 'destroy'])->name('delete');
    });
    
});