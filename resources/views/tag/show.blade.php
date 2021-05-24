@extends('layouts.store')

@section('title')
<title>{{ $tag->name }}</title>
@endsection

@section('content')
<main class="container">
    <!-- Breadcrumb -->
    <nav class="mb-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Página inicial</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $tag->name }}</li>
        </ol>
    </nav>

    <!-- Produtos com Tag -->
    <section class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset($product->image) }}" class="card-img-top w-100" alt="">
                    <div class="card-body">
                        <p class="h5 card-title">{{ $product->name }}</p>
                        <p class="card-text">R$
                            {{ number_format($product->price, 2, ',', '.') }}
                        </p>
                        <a href="{{ route('cart.add', $product->id) }}"
                            class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <nav class="d-flex justify-content-center">
        {{ $products->links() }}
    </nav>
</main>
@endsection
