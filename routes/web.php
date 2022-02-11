<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\CorretorController;

use App\Http\Controllers\RedacaoController;

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

Route::get('/login', [UserController::class,'login'])->name('login.page');

Route::post('/auth', [UserController::class,'auth'])->name('auth.user');




Route::middleware(['client'])->group(function () {
 	
	Route::get('user/perfil/teste/token-0B69BB', [UserController::class, 'perfil'])->name('user.perfil');      

	Route::get('user/postar-redacao', [UserController::class, 'postarRedacao'])->name('user.postar_redacao');

	Route::post('user/postar-redacao/store', [UserController::class, 'store'])->name('redacao.store');

	Route::get('user/correcoes', [UserController::class, 'correcoes'])->name('user.correcoes');

	Route::get('user/correcoes/{id}', [UserController::class, 'correcoesShow'])->name('redacoes.show.usuario');

	Route::get('user/mudar-senha', [UserController::class, 'mudarSenha'])->name('user.mudar_senha');

    Route::post('user/atualizar-senha', [UserController::class, 'atualizarSenha'])->name('user.atualizar_senha');

	Route::get('/logout', [UserController::class, 'logout'])->name('logout');

});



Route::middleware(['admin'])->group(function () {
    
    Route::get('/corretor/home', [CorretorController::class, 'home'])->name('corretor.home');     

	Route::get('/corretor/corrigir', [RedacaoController::class, 'index'])->name('corretor.corrigir_redacoes');


	Route::get('/corretor/corrigir/editar/{id}', [RedacaoController::class, 'edit'])->name('redacoes.edit'); 

	Route::put('/corretor/corrigir/update/{id}', [RedacaoController::class,'update'])->name('redacao.update');   
	
	Route::get('/logout-corretor', [CorretorController::class, 'logout'])->name('corretor.logout');
	
	Route::get('corretor/registro', [UserController::class,'registro'])->name('registro.page');

	Route::post('corretor/registro/store', [UserController::class, 'storeUsuario'])->name('user.store');

	Route::get('corretor/mudar-senha', [CorretorController::class, 'mudarSenha'])->name('corretor.mudar_senha');

    Route::post('corretor/atualizar-senha', [CorretorController::class, 'atualizarSenha'])->name('corretor.atualizar_senha');
});


