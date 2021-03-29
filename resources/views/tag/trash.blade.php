<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Tags Desativadas</title>
    @include('layouts.links')
    <script>
        function restaurar() {
            return confirm('Você deseja restaurar a tag?');
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

        <h1 class="my-4">Lista de Tags Desativadas</h1>
        <table class="table table-bordered table-hover caption-top">
            <caption>Tabela de tags desativadas</caption>
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <form class="d-inline" method="POST"
                                action="{{ route('tag.restore', $tag->id) }}"
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
        <a class="my-4 btn btn-sm btn-primary" href="{{ route('tag.index') }}">Verificar tags ativas</a>
    </main>
</body>

</html>
