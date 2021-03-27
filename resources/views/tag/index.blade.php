<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Tags</title>
    @include('layouts.links')
    <script>
        function remover() {
            return confirm('Você deseja deletar a tag?');
        }

    </script>
</head>

<body>
    @include('layouts.header')
    <main class="container">

        @if(session()->has('success'))
            <div class="alert alert-success my-4" role="alert">
                {{session()->get('success')}}
            </div>
        @endif

        <h1 class="my-4">Lista de Tags</h1>
        <table class="table table-bordered table-hover caption-top">
            <caption>Tabela de tags cadastradas</caption>
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
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        <td>
                            <a href=" {{route('tag.edit', $tag->id)}}"
                                class="btn btn-sm btn-warning">Editar</a>

                            <form method="POST" action="{{route('tag.destroy', $tag->id)}}"
                                onsubmit="return remover();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger d-inline">Deletar</button>
                            </form>



                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <a class="my-4 btn btn-sm btn-success" href=" {{route('tag.create')}}">Cadastrar nova
            tag</a>
    </main>
</body>

</html>
