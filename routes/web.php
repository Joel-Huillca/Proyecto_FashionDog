<?php

use App\Http\Controllers\EstilistaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/estilista', [EstilistaController::class,"index"])->name("estilista");
Route::get('/estilista/create', [EstilistaController::class,"create"])->name("crear_estilista");
Route::post('/estilista/create', [EstilistaController::class,"store"])->name("crear_estilista_post");
Route::get('/estilista/edit/{id}', [EstilistaController::class,"edit"])->name("editar_estilista");
Route::post("/estilista/edit/{id}",[EstilistaController::class,"update"])->name("editar_estilista_post");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
