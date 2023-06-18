<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContainerController;

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


Route::get('/add_new_container', function () {
    return view('add');
})->name('container.add_new_container');;
// Route::get("/detail",[ContainerController::class,"index"])->name('home.index');
Route::get("/",[ContainerController::class,"index"])->name('container.index');
Route::get("/container/view/{id}",[ContainerController::class,"view"])->name('container.view');
Route::get("/container/add/{id}",[ContainerController::class,"add"])->name('container.add');
Route::get("/container/edit/{id}",[ContainerController::class,"edit"])->name('container.edit');
Route::post("/container/update/{id}",[ContainerController::class,"update"])->name('container.update');
Route::post("/container/store",[ContainerController::class,"store"])->name('container.store');
