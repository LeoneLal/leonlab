<body>
        <div class="header">
            <div class="top-left">
                <a href="{{ url('/') }}" class="link"
                    ><img
                        class="logo"
                        src="{{ asset('images/logo.png') }}"
                        alt="logo"
                /></a>
            </div>

            <div class="top-center">
                <form
                    method="GET"
                    action="{{ route('jeux.search')}}"
                    class="d-flex mr-3"
                >
                    <input
                        type="text"
                        name="q"
                        placeholder="Trouvez votre jeu !"
                    />
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Mon compte</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif @endauth
            </div>
            @endif
        </div>

        <div class="main">
            <div class="container">
                <div class="row">
                    <img
                        src="../../images/jeux/{{$jeu->slug}}"
                        alt="{{ $jeu->nom }}"
                    />
                    <div class="column center">
                        <p><b>{{ $jeu->nom }}</b></p>
                        <div class="consoles">
                            <div class="console">
                                <div class="logo">
                                    <img
                                        src="../../images/{{ $jeu->console['slug'] }}"
                                        alt="{{ $jeu->console['console'] }}"
                                    />
                                </div>
                                <p><b>{{ $jeu->console['console'] }}</b></p>
                            </div>
                        </div>
                        <p>{{ $jeu->prix }}€</p>
                    </div>
                </div>
                <div class="block">
                    <h3>Description</h3>
                    <p>{{ $jeu->description }}</p>
                </div>
                <div class="block">
                    <h3>Avis</h3>
                    <div class="comments">
                        <p>1</p>
                        <p>2</p>
                        <p>3</p>
                        <p>4</p>
                    </div>
                </div>
            </div>
            <div class="panier">
                <form action="{{ route('cart.store')}}" method="POST">
                    @csrf
                    <input
                        type="hidden"
                        name="product_id"
                        value="{{ $jeu->id }}"
                    />
                    @if($jeu->stock > 0 && $jeu->stock <= 3)
                    <div class="alert alert-warning">
                        <p>Plus que {{ $jeu->stock }} jeux en stock !</p>
                    </div>
                    <button type="submit" class="btn btn-dark">
                        Ajouter au panier
                    </button>
                    @elseif($jeu->stock > 0)
                    <button type="submit" class="btn btn-dark">
                        Ajouter au panier
                    </button>
                    @else
                    <div class="alert alert-danger">
                        <p>Plus en stock !</p>
                    </div>
                    @endif
                </form>
            </div>
        </div>
        @extends('footer')
    </body>
</html>