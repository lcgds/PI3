<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista de Produtos</title>
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <h1 class="my-4">Lista de produtos</h1>
        <table class="table table-bordered table-hover caption-top">
            <caption>Tabela de produtos cadastrados</caption>
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $prod)
                <tr>
                    <td>{{ $prod->id }}</td>
                    <td>{{ $prod->name }}</td>
                    <td>R$ {{ $prod->price }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Visualizar</a>
                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                        <a href="#" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="my-4 btn btn-sm btn-success" href=" {{ Route('product.create') }} ">Cadastrar novo produto</a>
    </main>
</body>
</html>