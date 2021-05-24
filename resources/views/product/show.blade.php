@extends('layouts.store')

@section('title')
    <title>{{ $product->name }}</title>
@endsection

@section('content')
    <main class="container">
        <!-- Breadcrumb -->
        <nav class="mb-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Página inicial</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $product->category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row justify-content-center">

            <!-- Foto -->
            <div class="col-sm-10 col-md-5 col-lg-5 text-center">
                <img class="img-fluid w-75" src="{{ asset($product->image) }}" alt="Foto de {{ $product->name }}">
            </div>

            <!-- Descrição -->
            <div class="col-sm-10 col-md-7 col-lg-7">

                <div class="border p-3">
                    <h2 class="h3 text-uppercase">{{ $product->name }}</h2>
                    <span>Código: {{ $product->id }}</span>
                    <hr>
                    <p class="my-2 text-start">{{ $product->description }}</p>
                    <p class="mt-3 h5">R$ {{ number_format($product->price, 2, ',', '.') }}</p>

                    <a href="{{ route('cart.add', $product->id) }}" class="my-2 btn btn-success">Adicionar ao carrinho</a>
                </div>

                <div class="mt-3 d-flex flex-row flex-wrap">
                    <span>Tags:</span>
                    @foreach($product->tags as $tag)
                        <a href="#"
                            class="text-decoration-none mx-2 p-2 badge rounded-pill bg-secondary text-white text-uppercase">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>

            </div>

        </div>

    </main>
@endsection