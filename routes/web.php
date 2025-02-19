<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('main');
// });

Route::get('/', [MainController::class, 'index']);

Route::get('/cadastro', [MainController::class, 'cadastro']);
Route::post('/cadastroSubmit', [MainController::class, 'cadastroSubmit']);

Route::get('/listar', [MainController::class, 'listar'])->name('listar');

Route::get('/{id}', [MainController::class, 'editaCadastro'])->name('edita');
Route::post('/editaSubmit', [MainController::class, 'editaCadastroSubmit'])->name('editaSubmit');

Route::get('/apaga/{id}', [MainController::class, 'apagaCadastro'])->name('apaga');
Route::post('/apagaConfirma/{id}', [MainController::class, 'apagaCadastroConfirma'])->name('apagaConfirma');

Route::get('/sobre-nos',

function () {
        echo "<h1>Sobre nós!</h1>";
    }

);
