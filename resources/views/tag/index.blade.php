<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Tags</title>
    @include('layouts.links')
    <script>
        function remover() {
            return confirm('Você deseja desativar a tag?');
        }

    </script>
</head>

<body>
    @include('layouts.header')
    <main class="container">

        @include('layouts.sessions')

        <h1 class="my-4">Lista de Tags</h1>
        <table class="table table-bordered table-hover caption-top">
            <caption>Tabela de tags cadastradas</caption>
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Quantidade de produtos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->products()->count() }}</td>
                        <td>
                            <a href=" {{ route('tag.edit', $tag->id) }}"
                                class="btn btn-sm btn-warning">Editar</a>

                            <form class="d-inline" method="POST"
                                action="{{ route('tag.destroy', $tag->id) }}"
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
        <a class="my-4 btn btn-sm btn-success" href=" {{ route('tag.create') }}">Cadastrar nova
            tag</a>
        <a class="my-4 btn btn-sm btn-secondary" href="{{ route('tag.trash') }}">Verificar tags
            inativas</a>
    </main>
</body>

</html>
