<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Corredores Desativados</title>
    @include('layouts.links')
    <script>
        function restaurar() {
            return confirm('Você deseja restaurar a categoria?');
        }

    </script>
</head>

<body>

    @include('layouts.header')

    <main class="container">

        @if(session()->has('success'))
            <div class="alert alert-success my-4" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        <h1 class="my-4">Lista de Corredores Desativados</h1>
        <table class="table table-bordered table-hover caption-top">
            <caption>Tabela de corredores desativados</caption>
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Quantidade de produtos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->products->count() }}</td>
                        <td>
                            <form class="d-inline" method="POST"
                                action="{{ route('category.restore', $category->id) }}"
                                onsubmit="return restaurar();">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success d-inline">Restaurar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <a class="my-4 btn btn-sm btn-primary" href="{{ route('category.index') }}">Verificar categorias ativas</a>
    </main>
</body>

</html>
