<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Exception;
use Illuminate\Http\Request;

//validator usado para as validações
use Illuminate\Support\Facades\Validator;
use League\Flysystem\UrlGeneration\TemporaryUrlGenerator;
use PhpParser\Node\Stmt\Echo_;
use Symfony\Component\HttpKernel\Attribute\WithLogLevel;

class controller_livro extends Controller
{
    public function cadastrar_livro(Request $infos_livros)
    {

        try {
            $infos_livros->validate([
                'id' => 'integer',
                'titulo' => 'string',
                'autor' => 'string',
                'data_lancamento' => 'date',
                'num_paginas' => 'integer',
                'genero' => 'in:Romance,Clássico,Ficção,Mistério,Ação,Drama'
            ]);

        } catch (Exception $e) {
            throw new Exception("Os dados inseridos são inválidos! Erro: " . $e->getMessage());
        }
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
            throw new Exception("Não foi possível cadastrar o livro no banco de dados! Erro: " . $e->getMessage());
        }

        echo "Cadastro concluído";
    }
    public function buscar_livro($id_livro)
    {
        try {
            $livro = Livro::findOrFail($id_livro);
            return response()->json(['livros' => $livro], 200);

        } catch (Exception $e) {
            throw new Exception("ID do livro não existe no banco de dados! Erro: " . $e->getMessage());
        }
    }
    public function atualizar_livro($id_livro, Request $infos_livros)
    {
        try {
            $infos_livros->validate([
                'id' => 'integer',
                'titulo' => 'string',
                'autor' => 'string',
                'data_lancamento' => 'date',
                'num_paginas' => 'integer',
                'genero' => 'in:Romance,Clássico,Ficção,Mistério,Ação,Drama'
            ]);

        } catch (Exception $e) {
            throw new Exception("Os dados inseridos são inválidos! Erro: " . $e->getMessage());
        }

        try {
            $livro = Livro::findOrFail($id_livro);

            $livro->id = $infos_livros->id;
            $livro->titulo = $infos_livros->titulo;
            $livro->autor = $infos_livros->autor;
            $livro->data_lancamento = $infos_livros->data_lancamento;
            $livro->num_paginas = $infos_livros->num_paginas;
            $livro->genero = $infos_livros->genero;

            $livro->save();
            echo "Livro atualizado!";

        } catch (Exception $e) {
            throw new Exception("Não foi possível atualizar o livro no banco! Erro: " . $e->getMessage());
        }

    }
    public function excluir_livro($id_livro)
    {
        try {
            $livro = Livro::findOrFail($id_livro);
            $livro->delete();

            echo "Livro excluído com sucesso!";

        } catch (Exception $e) {
            throw new Exception("ID do livro não existe no banco de dados! Erro: " . $e->getMessage());
        }
    }
    public function listar_livros()
    {

        $livros = Livro::all();

        if (count($livros) == 0) {
            throw new Exception("Banco de dados vazio!");
        }

        return response()->json(['livros' => $livros], 200);
    }

    public function filtrar_livros(Request $request)
    {
        $livros = Livro::query();

        try {
            if ($request->has('titulo')) {
                $livros->where('titulo', 'LIKE', '%' . $request->titulo . '%');
            }

            if ($request->has('autor')) {
                $livros->where('autor', 'LIKE', '%' . $request->autor . '%');
            }

            if ($request->has('genero')) {
                $livros->where('genero', 'LIKE', '%' . $request->genero . '%');
            }

            if ($request->has('data_inicial')) {
                $livros->where('data_lancamento', '>=', $request->data_inicial);
            }

            if ($request->has('data_final')) {
                $livros->where('data_lancamento', '<=', $request->data_final);
            }

            $resultado = $livros->get();
            return response()->json(['livros' => $resultado], 200);

        } catch (Exception $e) {
            throw new Exception("O parâmetro ou valor passados não correspondem à nenhuma coluna ou valor do banco de dados, insira novamente. Código do erro: " . $e->getMessage());
        }

    }

}