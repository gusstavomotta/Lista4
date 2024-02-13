<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller_livro;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/cadastrar_livro', [controller_livro::class, 'cadastrar_livro']);

Route::get('/buscar_livro/{id_livro}', [controller_livro::class, 'buscar_livro']);

Route::post('/atualizar_livro/{id_livro}', [controller_livro::class, 'atualizar_livro']);

Route::delete('/excluir_livro/{id_livro}', [controller_livro::class, 'excluir_livro']);

Route::get('/listar_livros', [controller_livro::class, 'listar_livros']);

Route::get('/filtrar_livros', [controller_livro::class, 'filtrar_livros']);