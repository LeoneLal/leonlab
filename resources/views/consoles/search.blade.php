<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>LéonLab</title>

    <!-- Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,600"
      rel="stylesheet"
    />

    <!-- Styles -->
    <link href="{{ asset('fa/css/all.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
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
        <a href="{{ route('cart.index') }}"><img src="../images/panier.png" alt="Panier"> <span class="badge badge-pill badge-dark ">{{ Cart::count()}}</span></a>
        @else
        <a href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif @endauth
      </div>
      @endif
    </div>
    <div class="main">
      <div class="center">
        <div class="consoles">
          <h2>Plateformes</h2>
          @foreach($consoles as $console)   
          <a href={{route('consoles.search', $console->id)}}>   
            <div class="console">
              <div class="console-img">
                <img src="../images/{{ $console->slug  }}" alt="{{ $console->console }}" />
              </div>
            <p><b>{{ $console->console }}</b></p>
          </div>
        </a>
        @endforeach
        </div>
        <div class="games">
        @foreach($jeux as $jeu)
          <a href="{{ route('jeux.show', $jeu->id) }}"> 
            <div class="game">
              <img src="../images/jeux/{{$jeu->slug}}" alt="{{ $jeu->nom }}" />
              <p><b>{{ $jeu->nom }}</b></p>
              <p>{{ $jeu->prix }}€</p>
            </div>
          </a>  
        @endforeach      
        </div>
      </div>
      <div class="pages">
      
      </div>
    </div>
    @extends('footer')
  </body>
</html>
