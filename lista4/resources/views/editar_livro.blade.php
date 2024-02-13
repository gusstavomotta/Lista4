<!DOCTYPE html>
<html lang="pt-br>
<head>
    <meta charset=" UTF-8>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro Livros</title>
</head>

<body>

    <form action="/atualizar_livro/{{ $livro->id }}" method="post">
        @csrf
        @method("PUT")
        <label for="">ID:</label>
        <input type="number" placeholder="Informe o ID: " name="id" value="{{ $livro->id }}">

        <label for="">Titulo:</label>
        <input type="text" placeholder="Informe o titulo: " name="titulo" value="{{ $livro->titulo }}">

        <label for="">autor:</label>
        <input type="text" placeholder="Informe o autor: " name="autor" value="{{ $livro->autor}}">

        <label for="">data_lancamento:</label>
        <input type="date" placeholder="Informe a data de lançamento: " name="data_lancamento"
            value="{{ $livro->data_lancamento }}">

        <label for="">num_paginas:</label>
        <input type="number" placeholder="Informe o numero de paginas: " name="num_paginas"
            value="{{ $livro->num_paginas }}">

        <label for="">genero:</label>
        <input type="text" placeholder="Informe o genero: " name="genero" value="{{ $livro->genero }}">

        <button>Enviar livro atualizado</button>
    </form>
</body>

</html>