<!DOCTYPE html>
<html lang="pt-br>
<head>
    <meta charset=" UTF-8>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro Livros</title>
</head>

<body>

    <form action="/cadastrar_livro" method="post">
        @csrf
        <label for="">ID:</label>
        <input type="number" placeholder="Informe o ID: " name="id">

        <label for="">Titulo:</label>
        <input type="text" placeholder="Informe o titulo: " name="titulo">

        <label for="">autor:</label>
        <input type="text" placeholder="Informe o autor: " name="autor">

        <label for="">data_lancamento:</label>
        <input type="date" placeholder="Informe a data de lançamento: " name="data_lancamento">

        <label for="">num_paginas:</label>
        <input type="number" placeholder="Informe o numero de paginas: " name="num_paginas">

        <label for="">genero:</label>
        <input type="text" placeholder="Informe o genero: " name="genero">

        <button>Enviar Cadastro</button>
    </form>
</body>

</html>