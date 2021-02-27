<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista de Produtos</title>
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function remover(route) {
            if (confirm('Você deseja deletar o produto?')) {
                window.location = route;
            }
        }
    </script>
</head>
<body>

    <main class="container">
        @if(session()->has('success'))
        <div class="alert alert-success my-4" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif
        <h1 class="my-4">Lista de produtos</h1>
        <table class="table table-bordered table-hover caption-top">
            <caption>Tabela de produtos cadastrados</caption>
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>R$ {{ $product->price }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Visualizar</a>
                        <a href=" {{ route('product.edit', $product->id) }} " class="btn btn-sm btn-warning">Editar</a>
                        <a href="#" onclick="remover('{{ route('product.destroy', $product->id) }}')" class="btn btn-sm btn-danger">Deletar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="my-4 btn btn-sm btn-success" href=" {{ route('product.create') }} ">Cadastrar novo produto</a>
    </main>
</body>
</html>