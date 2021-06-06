<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController; 
use App\Http\Controllers\EstudioController; //Para poder usar el controladorl
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

// En view es donde se situán las rutas de las vistas

Route::get('/', function () {
    return view('welcome'); //Visualiza el contenido del archivo view
});

/*Route::get('/empleado', function () { // Para seleccionar la ruta, cada vez que se acceda a esta URL 
    // Se muestra la vista
    return view('empleado.index'); // . Nos permite acceder a los archivos que están dentro de la carpeta
    //Index para acceder a los archivos
});
*/

//Route::get('/empleado/create', [EmpleadoController::class, 'create']); //Creamos la ruta que redirige al método
Route::resource('anime', AnimeController::class)->middleware('auth');
Route::resource('estudio', EstudioController::class)->middleware('auth'); //Permite que se pueda acceder al resto de rutas, impide crear si no se registra
// Crea enlaces directos

Auth::routes(['register'=>false, 'reset'=>false]); //Elimina el register

Route::get('/home', [AnimeController::class])->name('home');
Route::get('/home', [EstudioController::class])->name('home');

Route::group(['middleware' => 'auth'], function (){

    Route::get('/', [AnimeController::class, 'index'])->name('home');
    Route::get('/', [EstudioController::class, 'index'])->name('home');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

