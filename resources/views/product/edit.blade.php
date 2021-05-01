<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Editar Produto</title>
    @include('layouts.links')

</head>

<body>
    @include('layouts.header')
    <main class="container">
        <h1 class="mt-4 mb-3">Editar Produto</h1>
        <form method="POST" action="{{ route('product.update', $product->id) }}"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-floating my-3">
                <input class="form-control" name="name" type="text" value="{{ $product->name }}" focused>
                <label class="form-label" for="name">Nome</label>
            </div>

            <div class="form-floating my-3">
                <input class="form-control" name="brand" type="text" value="{{ $product->brand }}">
                <label class="form-label" for="brand">Marca</label>
            </div>

            <div class="form-floating my-3">
                <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                <label class="form-label" for="description">Descrição</label>
            </div>

            <div class="form-floating my-3">
                <input class="form-control" name="price" min="1.00" max="1000.00" type="number" step="0.01" lang="pt-br" value="{{ $product->price }}">
                <label class="form-label" for="price">Preço</label>
            </div>

            <div class="form-floating my-3">
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected
                            @endif>
                            {{ $category->name }}
                            </@option>
                    @endforeach
                </select>
                <label class="form-label" for="category_id">Categoria</label>
            </div>

            <div class="form-group input-group my-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="tagsGroup">Tags</label>
                </div>

                <select multiple class="form-control custom-select" id="tagsGroup" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" @if($product->tags->contains($tag->id)) selected
                            @endif>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="my-3">
                <label class="form-label" for="image">Imagem</label>
                <input class="form-control" name="image" type="file">
            </div>

            <div class="form-floating my-3">
                <select class="form-control" name="spotlight" type="select">
                    <option value="1" @if($product->spotlight==1) selected @endif>Sim</option>
                    <option value="0" @if($product->spotlight==0) selected @endif>Não</option>
                </select>
                <label class="form-label" for="name">Produto destacado</label>
            </div>

            <button class="btn btn-success" type="submit">Atualizar</button>
        </form>
    </main>
</body>

</html>
