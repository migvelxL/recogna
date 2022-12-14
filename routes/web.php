<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/solic_cad', [App\Http\Controllers\AdmController::class, 'solic_cad']);

Auth::routes();

Route::post('/cadastro', [App\Http\Controllers\AdmController::class, 'store'])->name('cadastro');

Route::post('/cad_user', [App\Http\Controllers\AdmController::class, 'create']);



Route::get('/alt_users/{id}', [App\Http\Controllers\ConsultaUserController::class, 'edit']);

Route::post('/update_user/{id}', [App\Http\Controllers\ConsultaUserController::class, 'update']);



Route::get('/del_users/{id}', [App\Http\Controllers\ConsultaUserController::class, 'delete']);

Route::post('/delete_user/{id}', [App\Http\Controllers\ConsultaUserController::class, 'destroy']);



Route::get('/controle_user', [App\Http\Controllers\ConsultaUserController::class, 'index'])->name('controle_user');

Route::post('/controle_user/pesquisa', [App\Http\Controllers\ConsultaUserController::class, 'pesquisa'])->name('controle_user.pesquisa');


Route::get('/cad_maquina', [App\Http\Controllers\MaquinasController::class, 'create']);

Route::post('/cadastrar', [App\Http\Controllers\MaquinasController::class, 'store'])->name('cadastrar');



Route::get('/controle_maq', [App\Http\Controllers\MaquinasController::class, 'index'])->name('controle_maq');

Route::post('/controle_maq/pesquisa', [App\Http\Controllers\MaquinasController::class, 'pesquisa'])->name('controle_maq.pesquisa');


Route::get('/alt_maq/{id}', [App\Http\Controllers\MaquinasController::class, 'edit']);

Route::post('/update_maq/{id}', [App\Http\Controllers\MaquinasController::class, 'update']);



Route::get('/del_maq/{id}', [App\Http\Controllers\MaquinasController::class, 'delete']);

Route::post('/delete_maq/{id}/{id2}', [App\Http\Controllers\MaquinasController::class, 'destroy']);


Route::get('/mais/{id}', [App\Http\Controllers\AdmController::class, 'index']);

Route::get('/alocar/{id}', [App\Http\Controllers\AlocarController::class, 'index']);

Route::post('/alocacao/{id}', [App\Http\Controllers\AlocarController::class, 'create']);


Route::get('/desalocar/{id}', [App\Http\Controllers\AlocarController::class, 'mostrar']);

Route::post('/desalocacao/{id}', [App\Http\Controllers\AlocarController::class, 'uncreate']);


Route::get('/ver/{id}', [App\Http\Controllers\AdmController::class, 'mostrar']);

Route::get('/alt/{id}', [App\Http\Controllers\AdmController::class, 'edit']);

Route::post('/update/{id}', [App\Http\Controllers\AdmController::class, 'update']);


Route::get('/contatos', [App\Http\Controllers\HomeController::class, 'pesquisa']);

Route::get('/area', [App\Http\Controllers\AdmController::class, 'pesquisa']);

Route::get('/log', [App\Http\Controllers\AdmController::class, 'teste']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/solicitacao', [App\Http\Controllers\EmailController::class, 'solic'])->name('solicitacao');



//Route::get('envio-email', function(){
 //   $user = new stdClass();
 //   $user->name = 'Agnes Bressan de Almeida';
 //   $user->email = 'agnesbressan3838@gmail.com';
    //return new \App\Mail\newRecogna($user);
 //   \Illuminate\Support\Facades\Mail::send(new \App\Mail\newRecogna());   
//});





