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

Route::get('/editar_livro/{id_livro}', function ($id_livro) {
    $livro = Livro::findOrFail($id_livro);
    return view('editar_livro', ['livro' => $livro]);
});

Route::put('/atualizar_livro/{id_livro}', function (Request $infos_livros, $id_livro) {
    $livro = Livro::findOrFail($id_livro);

    $livro->id = $infos_livros->id;
    $livro->titulo = $infos_livros->titulo;
    $livro->autor = $infos_livros->autor;
    $livro->data_lancamento = $infos_livros->data_lancamento;
    $livro->num_paginas = $infos_livros->num_paginas;
    $livro->genero = $infos_livros->genero;
    $livro->save();
    echo "Livro atualizado!";

});

Route::get('/listar_livro', function () {
    return view('home');
});