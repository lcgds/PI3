<header class="mb-5">
    <nav class="navbar navbar-expand-md navbar-dark larvel-color">
        <div class="container">
            <!-- Brand -->
            <a class="text-reset text-decoration-none" href="{{url('/')}}">
                <i class="align-baseline fs-2 bi bi-shop"></i>
                <h1 class="d-inline-flex navbar-brand mx-2 mb-0 p-0">Mercearia Lar Vel</h1>
            </a>

            <!-- Navbar Toogler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Abre menu">
                <i style="color: white;" class="fs-2 bi bi-list"></i>
            </button>

            <!-- Navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav mt-lg-2 mt-md-2">

                    <li class="nav-item mx-2 dropdown">

                        <a class="p-0 text-reset text-decoration-none nav-link dropdown-toggle" href="#"
                            id="navbarDropdownMenuCategory" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Corredores
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuCategory">
                            @foreach(\App\Models\Category::all() as $category)
                                <li><a class="dropdown-item" href="{{ route('category.show', $category->id) }}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                        
                    </li>

                    <li class="nav-item mx-2">
                        <a class="p-0 text-reset text-decoration-none nav-link"
                            href="{{ route('product.index') }}">Produtos</a>
                    </li>

                    <li class="nav-item mx-2 dropdown">

                        <a class="p-0 text-reset text-decoration-none nav-link dropdown-toggle" href="#"
                            id="navbarDropdownMenuTags" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tags
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuTags">
                            @foreach(\App\Models\Tag::all() as $tag)
                                <li><a class="dropdown-item" href="{{ route('tag.show', $tag->id) }}">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>
                        
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mt-lg-2 mt-md-2">
                        @if (Auth()->user())
                            <li class="nav-item mx-2">
                                <i title="{{Auth()->user()->name}}" class="align-baseline fs-5 bi bi-person-circle"></i>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="p-0 text-reset text-decoration-none nav-link" href="{{ route('cart.show') }}">
                                    <i class="align-baseline fs-5 bi bi-cart position-relative">
                                        @if ( (\App\Models\Cart::count()) > 0 )
                                            <span style="font-size: 10px;" class="badge rounded-pill text-dark bg-warning position-absolute top-0 start-100 translate-middle">{{ \App\Models\Cart::count() }}</span>
                                        @endif
                                    </i>
                                </a>
                            </li>
                        @else
                            <li class="nav-item mx-2">
                                <a class="p-0 text-reset text-decoration-none nav-link" href="{{ route('register') }}">Cadastro</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="p-0 text-reset text-decoration-none nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif
                    </ul>
            </div>
        </div>
    </nav>
</header>
