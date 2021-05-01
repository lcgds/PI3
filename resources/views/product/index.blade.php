<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Produtos</title>
    @include('layouts.links')
    <script>
        function remover() {
            return confirm('Você deseja desativar o produto?');
        }

    </script>
</head>

<body>
    @include('layouts.header')
    <main class="container">
        @include('layouts.sessions')

        <h1 class="my-4">Lista de Produtos</h1>
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
                    <th>Imagem</th>
                    <th>Destaque</th>
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
                        <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <img style="width: 48px;" src="{{ asset($product->image) }}" alt="Imagem indisponível">
                        </td>
                        <td>
                            @switch($product->spotlight) 
                                @case(1)
                                    Sim
                                    @break
                                @case(0)
                                    Não
                                    @break
                            @endswitch
                        </td>
                        <td>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-primary">Visualizar</a>
                            <a href="{{ route('product.edit', $product->id) }}"
                                class="btn btn-sm btn-warning">Editar</a>

                            <form class="d-inline" method="POST"
                                action="{{ route('product.destroy', $product->id) }}"
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
        <a class="my-4 btn btn-sm btn-success" href="{{ route('product.create') }}">Cadastrar novo
            produto</a>
        <a class="my-4 btn btn-sm btn-secondary" href="{{ route('product.trash') }}">Verificar
            produtos inativos</a>
    </main>
</body>

</html>
