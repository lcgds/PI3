<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Editar Corredor</title>
    @include('layouts.links')
</head>

<body>
    @include('layouts.header')
    <main class="container">
        <h1 class="mt-4 mb-3">Editar Corredor</h1>
        <form method="POST" action="{{route('category.update', $category->id)}}">
            @method('PATCH')
            @csrf
            <div class="form-floating my-3">
                <input class="form-control" name="name" type="text" value="{{$category->name}}" focused>
                <label class="form-label" for="name">Nome</label>
            </div>

            <button class="btn btn-success" type="submit">Atualizar</button>
        </form>
    </main>
</body>

</html>
