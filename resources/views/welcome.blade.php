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
        <img class="logo" src="images/logo.png" alt="logo" />
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

        <a href="{{ route('cart.index') }}"><img src="images/panier.png" alt="Panier"> <span class="badge badge-pill badge-dark ">{{ Cart::count()}}</span></a>
      </div>
      @endif
    </div>
    <div class="main">
      @if (session('success'))
        <div class="alert alert-success">
          {{session('success')}}
        </div>
      @endif
      @if (session('warning'))
        <div class="alert alert-warning">
          {{session('warning')}}
        </div>
      @endif
      <!--<div class="filter">
          <p><b>Prix croissant</b><i class="fas fa-chevron-circle-down"></i></p>
      </div>-->
      <div class="center">
        <div class="consoles">
        <h2>Plateformes</h2>
        @foreach($consoles as $console)   
        <a href={{route('consoles.search', $console->id)}}>   
          <div class="console">
            <div class="logo">
              <img src="images/{{ $console->slug }}" alt="{{ $console->console }}" />
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
              <img src="images/jeux/{{$jeu->slug}}" alt="{{ $jeu->nom }}" />
              <p><b>{{ $jeu->nom }}</b></p>
              <p><b>{{ $jeu->prix }}€</b></p>
            </div>
          </a>
        @endforeach
        </div>
      </div>
      <div class="pages">
      {{ $jeux->links() }}
      </div>
      
    </div>
    @extends('footer')
  </body>
</html>
