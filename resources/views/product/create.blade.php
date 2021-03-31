<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastrar Produto</title>
    @include('layouts.links')
</head>

<body>
    @include('layouts.header')
    <main class="container">
        <h1 class="mt-4 mb-3">Cadastrar Produto</h1>
        <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-floating my-3">
                <input class="form-control" name="name" type="text" focused>
                <label class="form-label" for="name">Nome</label>
            </div>

            <div class="form-floating my-3">
                <input class="form-control" name="brand" type="text">
                <label class="form-label" for="brand">Marca</label>
            </div>

            <div class="form-floating my-3">
                <textarea class="form-control" name="description"></textarea>
                <label class="form-label" for="description">Descrição</label>
            </div>

            <div class="form-floating my-3">
                <input class="form-control" name="price" min="1.00" max="1000.00" step="0.25" type="number">
                <label class="form-label" for="price">Preço</label>
            </div>

            <div class="form-floating my-3">
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <label class="form-label" for="category_id">Categoria</label>
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
