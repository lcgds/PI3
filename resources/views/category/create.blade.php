<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastrar Corredor</title>
    @include('layouts.links')
</head>

<body>
    @include('layouts.header')
    <main class="container">
        <h1 class="mt-4 mb-3">Cadastrar Corredor</h1>
        <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-floating my-3">
                <input class="form-control" name="name" type="text" focused>
                <label class="form-label" for="name">Nome</label>
            </div>

            <div class="my-3">
                <label class="form-label" for="image">Imagem</label>
                <input class="form-control" name="image" type="file">
            </div>

            <button class="btn btn-success" type="submit">Salvar</button>
        </form>
    </main>
</body>

</html>
