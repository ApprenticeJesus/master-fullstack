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

//Cargando clases
use App\Http\Middleware\ApiAuthMiddleware;

//Rutas de prueba
Route::get('/', function () {
    return '<h1>Hola mundo con Laravel.</h1>';
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/pruebas/{nombre?}', function ($nombre = null) {
    $texto = '<h2>Texto desde una ruta.</h2>';
    $texto .= 'Nombre: ' . $nombre;
    return view('pruebas', array(
'texto' => $texto
    ));
});

Route::get('/animales', [App\Http\Controllers\PruebasController::class, 'index']);
Route::get('/test-orm', [App\Http\Controllers\PruebasController::class, 'testOrm']);

//Rutas del API
//Rutas de prueba
/*Route::get('/entrada/pruebas', [App\Http\Controllers\PostController::class, 'pruebas']);
Route::get('/categoria/pruebas', [App\Http\Controllers\CategoryController::class, 'pruebas']);
Route::get('/usuario/pruebas', [App\Http\Controllers\UserController::class, 'pruebas']);*/

//Rutas del controlador de usuarios
Route::post('/api/register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('/api/login', [App\Http\Controllers\UserController::class, 'login']);
Route::put('/api/user/update', [App\Http\Controllers\UserController::class, 'update']);
Route::post('/api/user/upload',[App\Http\Controllers\UserController::class, 'upload'])->middleware(ApiAuthMiddleware::class);
Route::get('/api/user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage']);
Route::get('/api/user/detail/{id}', [App\Http\Controllers\UserController::class, 'detail']);

//Rutas del controlador de categorías

Route::resource('/api/category', 'App\Http\Controllers\CategoryController');

//Rutas del controlador de posts (entradas)

Route::resource('/api/post', 'App\Http\Controllers\PostController');
Route::post('/api/post/upload',[App\Http\Controllers\PostController::class, 'upload']);
Route::get('/api/post/image/{filename}', [App\Http\Controllers\PostController::class, 'getImage']);
Route::get('/api/post/category/{id}',[App\Http\Controllers\PostController::class, 'getPostsByCategory']);
Route::get('/api/post/user/{id}',[App\Http\Controllers\PostController::class, 'getPostsByUser']);