<?php

use App\Models\Telefone;
use App\Models\Contato;
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


//Rotas contatos
Route::get('contatos/index',[\App\Http\Controllers\ContatoController::class,'index'])->name('contatos.index');
Route::get('contatos/create',[\App\Http\Controllers\ContatoController::class,'create'])->name('contatos.create');
Route::get('contatos/edit/{id}',[\App\Http\Controllers\ContatoController::class,'edit'])->name('contatos.edit');
Route::post('contatos/update',[\App\Http\Controllers\ContatoController::class,'update'])->name('contatos.update');
Route::post('contatos/store',[\App\Http\Controllers\ContatoController::class,'store'])->name('contatos.store');
Route::get('contatos/destroy/{id}',[\App\Http\Controllers\ContatoController::class,'destroy'])->name('contatos.destroy');

//Rotas Telefones



Route::any('telefones/index/{id}',[\App\Http\Controllers\TelefoneController::class,'index'])->name('telefones.index');
Route::get('telefones/create',[\App\Http\Controllers\TelefoneController::class,'create'])->name('telefones.create');
Route::get('telefones/edit/{id}',[\App\Http\Controllers\TelefoneController::class,'edit'])->name('telefones.edit');
Route::post('telefones/update',[\App\Http\Controllers\TelefoneController::class,'update'])->name('telefones.update');
Route::post('telefones/store',[\App\Http\Controllers\TelefoneController::class,'store'])->name('telefones.store');
Route::get('telefones/destroy/{id}',[\App\Http\Controllers\TelefoneController::class,'destroy'])->name('telefones.destroy');


//teste
Route::get('/teste', function () {
    //(selecione tudo da tabela contatos  e tabela telefone onde  id = contato_id)
   // $contato = Contato::with('telefones')->where('id',30)->first();
    $contato = Contato::query()->with('telefones')->where('id',30)->get(['nome','id']);
    $contato;

    foreach($contato as $c){
  echo $c->nome;
  echo $c->telefones->telefone;

    }
    return null;

});


Route::get('/', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
