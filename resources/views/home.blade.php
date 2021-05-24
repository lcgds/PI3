@extends('layouts.store')

@section('css')
<style>
    #banner {
        background: url('https://via.placeholder.com/2000x800');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 400px;
    }

</style>
@endsection

@section('content')

<section class="container d-flex align-items-center p-5 mb-5" id="banner">
</section>

<section class="container">
    <div class="row mb-4">
        <div class="text-center">
            <h2>Produtos em destaque</h2>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach(App\Models\Product::getBestProducts() as $product)
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
    </div>

</section>

@endsection
