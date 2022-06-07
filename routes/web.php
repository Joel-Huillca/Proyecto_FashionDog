<?php

use App\Http\Controllers\EstilistaController;
use App\Http\Controllers\HabilitarUsuarioController;
use App\Http\Controllers\SolicitudController;
use App\Models\Solicitud;
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

Route::middleware(['rutasEstilista'])->group(function () {
    Route::get('/estilista', [EstilistaController::class,"index"])->name("estilista");
    Route::get('/estilista/create', [EstilistaController::class,"create"])->name("crear_estilista");
    Route::post('/estilista/create', [EstilistaController::class,"store"])->name("crear_estilista_post");
    Route::get('/estilista/edit/{id}', [EstilistaController::class,"edit"])->name("editar_estilista");
    Route::post("/estilista/edit/{id}",[EstilistaController::class,"update"])->name("editar_estilista_post");
    Route::get('/usuario', [HabilitarUsuarioController::class,'index'])->name('usuario');
    Route::get('/usuario/{id}', [HabilitarUsuarioController::class,'updateStatus'])->name('cambiarEstado');
});

Route::get('/servicio',[SolicitudController::class,'index'])->name('solicitud');
Route::get('/servicio/create', [SolicitudController::class,'create'])->name('crear_solicitud');
Route::post('/servicio/create', [SolicitudController::class,'store'])->name('crear_solicitud_post');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
