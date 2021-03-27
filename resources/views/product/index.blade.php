<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Produtos</title>
    @include('layouts.links')
    <script>
        function remover(route) {
            if (confirm('Você deseja deletar o produto?')) {
                window.location = route;
            }
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
        <h1 class="my-4">Lista de produtos</h1>
        <table class="table table-bordered table-hover caption-top">
            <caption>Tabela de produtos cadastrados</caption>
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->brand}}</td>
                        <td>{{$product->description}}</td>
                        <td>R$ {{$product->price}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Visualizar</a>
                            <a href="{{route('product.edit', $product->id)}}"
                                class="btn btn-sm btn-warning">Editar</a>
                            <a href="#"
                                onclick="remover('{{route('product.destroy', $product->id)}}')"
                                class="btn btn-sm btn-danger">Deletar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="my-4 btn btn-sm btn-success" href="{{route('product.create')}}">Cadastrar novo
            produto</a>
    </main>
</body>

</html>
