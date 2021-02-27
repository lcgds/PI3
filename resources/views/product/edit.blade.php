<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar Produto</title>
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <h1 class="mt-4 mb-3">Editar Produto</h1>
        <form method="post" action=" {{ route('product.update', $product->id) }} ">
            @csrf
            <div class="form-floating my-3">
                <input class="form-control" name="name" type="text" value=" {{ $product->name }} " focused>
                <label class="form-label" for="name">Nome</label>
            </div>
            
            <div class="form-floating my-3">
                <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                <label class="form-label" for="description">Descrição</label>
            </div>

            <div class="form-floating my-3">
                <input class="form-control" name="price" min="1.00" max="1000.00" step="0.01" type="number" value=" {{ $product->price }} ">
                <label class="form-label" for="price">Preço</label>
            </div>

            <button class="btn btn-success" type="submit">Atualizar</button>
        </form>
    </main>
</body>
</html>