@extends('layouts.store')

@section('title')
<title>Pagamento</title>
@endsection

@section('content')
<main class="container">
    <h2 class="mb-4">Pagamento</h2>
    <div class="row row-auto justify-content-around">
        <section class="p-3 col-sm-10 col-md-5 col-lg-5">
            <h3>Endereço de entrega</h3>

            <adress>
                <span class="d-block">Av. Imperatriz Leopoldina, 447</span>
                <span class="d-block">Vila Leopoldina, São Paulo - SP</span>
                <span class="d-block">CEP 05305-010</span>
            </adress>

            <a class="float-end mt-3 text-decoration-none" href="#">Trocar o endereço</a>
        </section>
        <section class="p-3 col-sm-10 col-md-5 col-lg-5 bg-light">
            <h3>Resumo da compra</h3>

            <div>
                <span>Quantidade de produtos:</span>
                <a href="{{ route('cart.show') }}" class="float-end me-4 text-decoration-none">{{ App\Models\Cart::count() }}</a>
            </div>

            <div>
                <span>Frete:</span>
                <span class="float-end me-4 text-success fw-bold text-uppercase">Grátis</span>
            </div>
            
            <hr>

            <div>
                <span class="h5">Total a pagar</span>
                <span class="float-end me-4 h5">R$ {{ number_format(App\Models\Cart::totalSum(), 2, ',', '.') }}</span>
            </div>
        </section>
    </div>
    <section class="mt-4">
        <h3 class="mb-4">Dados de pagamento</h3>
        <form class="row row-auto justify-content-center">
        @csrf
            <div class="my-3 col-sm-10 col-md-10 col-lg-5">
                <label for="cardNumber" class="visually-hidden">Número do cartão</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <input class="form-control" placeholder="Número do cartão" type="text" name="cardNumber" id="cardNumber">
                </div>
            </div>
            <div class="my-3 col-sm-10 col-md-10 col-lg-5">
                <label for="cardOwner" class="visually-hidden">Nome impresso no cartão</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="bi bi-person"></i>
                    </div>
                    <input class="form-control" placeholder="Nome impresso no cartão" type="text" name="cardOwner" id="cardOwner">
                </div>
            </div>
            <div class="my-3 col-sm-10 col-md-5 col-lg-5">
                <label for="cardValidity" class="visually-hidden">Validade</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="bi bi-calendar3"></i>
                    </div>
                    <input class="form-control" placeholder="Validade" type="text" name="cardValidity" id="cardValidity">
                </div>
            </div>
            <div class="my-3 col-sm-10 col-md-5 col-lg-5">
                <label for="cardCode" class="visually-hidden">Código CVV</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <i class="bi bi-key"></i>
                    </div>
                    <input class="form-control" placeholder="Código CVV" type="text" name="cardCode" id="cardCode">
                </div>
            </div>
        </form>
        <div class="p-3 col-sm-10 col-md-5 col-lg-5">

        </div>
    </section>
</main>
@endsection
