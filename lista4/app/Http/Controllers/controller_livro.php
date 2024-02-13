<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Exception;
use Illuminate\Http\Request;

class controller_livro extends Controller
{
    public function cadastrar_livro(Request $infos_livros)
    {
        try {
            Livro::create([
                'id' => $infos_livros->id,
                'titulo' => $infos_livros->titulo,
                'autor' => $infos_livros->autor,
                'data_lancamento' => $infos_livros->data_lancamento,
                'num_paginas' => $infos_livros->num_paginas,
                'genero' => $infos_livros->genero
            ]);

        } catch (Exception $e) {
            return response($e->getMessage());
        }
        echo "Cadastro concluído";
    }
    public function buscar_livro($id_livro)
    {
        $livro = Livro::findOrFail($id_livro);
        return [
            $livro->id,
            $livro->titulo,
            $livro->autor,
            $livro->data_lancamento,
            $livro->num_paginas,
            $livro->genero
        ];
    }

}