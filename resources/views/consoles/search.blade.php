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
        <a href="{{ url('/') }}" class="link"><img class="logo" src="../images/logo.png" alt="logo" /></a>
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
      <div class="filter">
          <p><b>Prix croissant</b><i class="fas fa-chevron-circle-down"></i></p>
        </div>
      <div class="center">
        <div class="consoles">
          <h2>Plateformes</h2>
          @foreach($consoles as $console)   
          <a href={{route('consoles.search', $console->id)}}>   
            <div class="console">
              <div class="logo">
                <img src="../images/{{ $console->slug  }}" alt="{{ $console->console }}" />
              </div>
            <p><b>{{ $console->console }}</b></p>
          </div>
        </a>
        @endforeach
        </div>
        <div class="games">
        @foreach($jeux as $jeu)
          <div class="game">
            <img src="../images/jeux/{{$jeu->slug}}" alt="{{ $jeu->nom }}" />
            <p><b>{{ $jeu->nom }}</b></p>
            <p>{{ $jeu->prix }}€</p>
          </div> 
        @endforeach        
        </div>
      </div>
      <div class="pages">
      
      </div>
    </div>
    @extends('footer')
  </body>
</html>
