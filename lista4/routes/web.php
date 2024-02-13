<?php

use App\Http\Controllers\controller_livro;
use App\Models\Livro;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::post('/cadastrar_livro', [controller_livro::class, 'cadastrar_livro']);

Route::get('/buscar_livro/{id_livro}', [controller_livro::class, 'buscar_livro']);

Route::post('/atualizar_livro/{id_livro}', [controller_livro::class, 'atualizar_livro']);

Route::delete('/excluir_livro/{id_livro}', [controller_livro::class, 'excluir_livro']);

Route::get('/listar_livros', [controller_livro::class, 'listar_livros']);

Route::get('/filtrar_livros', [controller_livro::class, 'filtrar_livros']);