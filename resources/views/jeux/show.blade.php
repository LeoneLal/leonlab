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
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  </head>
  <body>
    <div class="header">
      <div class="top-left">
        <a href="{{ url('/') }}" class="link"><img class="logo" src="{{ asset('images/logo.png') }}" alt="logo" /></a>
      </div>

      <div class="top-center">
        <form method='GET' action="{{ route('jeux.search')}}" class="d-flex mr-3">
            <input type="text" name="q" placeholder="Trouvez votre jeu !" />
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
        <div class="one-game container">
          <div class="row">
            <img src="../../images/jeux/{{$jeu->slug}}" alt="{{ $jeu->nom }}" />
            <p><b>{{ $jeu->nom }}</b></p>
            <p>{{ $jeu->console['console'] }}</p>
            <p>{{ $jeu->prix }}€</p>
          </div>
          <div>
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
        <div class="panier">
          <form action="{{ route('cart.store')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $jeu->id }}">
            <button type="submit" class="btn btn-dark">Ajouter au panier</button>
          </form>
        </div>
    </div>
    @extends('footer')
  </body>
</html>
