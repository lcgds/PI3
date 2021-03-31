<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Corredores</title>
    @include('layouts.links')
    <script>
        function remover() {
            return confirm('Você deseja desativar a categoria?');
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

        <h1 class="my-4">Lista de Corredores</h1>
        <table class="table table-bordered table-hover caption-top">
            <caption>Tabela de corredores cadastrados</caption>
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Imagem</th>
                    <th>Quantidade de produtos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td><img style="width: 48px;" src="{{ asset($category->image) }}" alt="Imagem indisponível"></td>
                        <td>{{ $category->products->count() }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}"
                                class="btn btn-sm btn-warning">Editar</a>

                            <form class="d-inline" method="POST"
                                action="{{ route('category.destroy', $category->id) }}"
                                onsubmit="return remover();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger d-inline">Desativar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <a class="my-4 btn btn-sm btn-success" href="{{ route('category.create') }}">Cadastrar novo
            corredor</a>
        <a class="my-4 btn btn-sm btn-secondary" href="{{ route('category.trash') }}">Verificar
            corredores inativos</a>
    </main>
</body>

</html>
