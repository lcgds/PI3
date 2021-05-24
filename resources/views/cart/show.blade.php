@extends('layouts.store')

@section('title')
<title>Carrinho</title>
@endsection

@section('content')
<main class="container">
    <h2 class="mb-4">Carrinho de compra</h2>

    <table class="table">
        <thead>
            <tr>
                <th>
                    <!--Imagem-->
                </th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
                <tr class="align-middle">
                    <td class="text-center"><img style="width: 48px;" src="{{ asset($item->product()->image) }} ">
                    </td>
                    <td><a class="text-decoration-none"
                            href="{{ route('product.show', $item->product()->id) }}">{{ $item->product()->name }}</a>
                    </td>
                    <td>R$ {{ number_format($item->product()->price, 2, ',', '.') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>R$
                        {{ number_format(($item->product()->price * $item->quantity), 2, ',', '.') }}
                    </td>
                    <td>
                        <a href="{{ route('cart.add', $item->product()->id) }}"
                            class="btn btn-sm btn-success">+</a>
                        <a href="{{ route('cart.remove', $item->product()->id) }}"
                            class="btn btn-sm btn-danger">-</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <section class="d-flex flex-column flex-wrap align-items-end">
        <span class="h3 mx-5">Total da compra: R$ {{ number_format(App\Models\Cart::totalSum(), 2, ',', '.') }}</span>
        <a href="{{ route('cart.payment') }}" class="btn btn-primary mx-5 my-2">Finalizar compra</a>
    </section>
</main>
@endsection
