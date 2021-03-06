<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista de Corredores</title>
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function remover(route) {
            if (confirm('Você deseja deletar o corredor?')) {
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

        <h1 class="my-4">Lista de Corredores</h1>
        <table class="table table-bordered table-hover caption-top">
            <caption>Tabela de corredores cadastrados</caption>
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>

                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href=" {{ route('category.edit', $category->id) }} " class="btn btn-sm btn-warning">Editar</a>
                        <a href="#" onclick="remover('{{ route('category.destroy', $category->id) }}')" class="btn btn-sm btn-danger">Deletar</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <a class="my-4 btn btn-sm btn-success" href=" {{ route('category.create') }} ">Cadastrar novo corredor</a>
    </main>
</body>
</html>
