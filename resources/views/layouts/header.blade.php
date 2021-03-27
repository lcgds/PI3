<header>
    <nav class="navbar navbar-expand-md navbar-dark larvel-color">
        <div class="container-fluid ">
            <a class="text-reset text-decoration-none" href="#">
                <i class="align-baseline fs-2 bi bi-shop"></i>
                <h1 class="d-inline navbar-brand mx-2 mb-0 p-0">Mercearia Lar Vel</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Abre menu">
                <i style="color: white;" class="fs-2 bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mt-lg-2 mt-md-2">
                    <li class="nav-item mx-2">
                        <a class="align-baseline p-0 text-reset text-decoration-none nav-link"
                            href="{{ route('category.index') }}" id="navbarCategorias">Corredores</a>
                    </li>

                    <li class="nav-item mx-2">
                        <a class="p-0 text-reset text-decoration-none nav-link"
                            href="{{ route('product.index') }}">Produtos</a>
                    </li>

                    <li class="nav-item mx-2">
                        <a class="p-0 text-reset text-decoration-none nav-link"
                            href="{{ route('tag.index') }}">Tags</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
