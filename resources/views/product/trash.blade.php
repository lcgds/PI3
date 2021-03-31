<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Produtos Desativados</title>
    @include('layouts.links')
    <script>
        function restaurar() {
            return confirm('Você deseja restaurar o produto?');
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
        <h1 class="my-4">Lista de Produtos Desativados</h1>
        <table class="table table-bordered table-hover caption-top">
            <caption>Tabela de produtos desativados</caption>
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->description }}</td>
                        <td>R$ {{ $product->price }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td><img style="width: 48px;" src="{{ asset($product->image) }}" alt="Imagem indisponível">
                        </td>
                        <td>
                            <form class="d-inline" method="POST"
                                action="{{ route('product.restore', $product->id) }}"
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
        <a class="my-4 btn btn-sm btn-primary" href="{{ route('product.index') }}">Verificar produtos
            ativos</a>
    </main>
</body>

</html>
