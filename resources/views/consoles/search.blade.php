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
        <a href="{{ url('/') }}"><img class="logo" src="../images/logo.png" alt="logo" /></a>
      </div>

      <div class="top-center">
      @include('partials.search')
        
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
                <img src="../images/{{ $console->console }}.png" alt="{{ $console->console }}" />
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