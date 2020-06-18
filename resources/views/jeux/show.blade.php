<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Léonlab - {{ $jeu->nom }}</title>

    <!-- Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,600"
      rel="stylesheet"
    />

    <!-- Styles -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  </head>
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
                    <img class="game-img"
                        src="../../images/jeux/{{$jeu->slug}}"
                        alt="{{ $jeu->nom }}"
                    />
                    <div class="column">
                        <p><b>{{ $jeu->nom }}</b></p>
                        <div class="console">
                            <div class="logo">
                                <img
                                    src="../../images/{{ $jeu->console['slug'] }}"
                                    alt="{{ $jeu->console['console'] }}"
                                />
                            </div>
                            <p><b>{{ $jeu->console['console'] }}</b></p>
                        </div>
                        <p>38 commentaires</p>
                        <div class="panier">
                            <p>{{ $jeu->prix }}€</p>
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
        </div>
        @extends('footer')
    </body>
</html>