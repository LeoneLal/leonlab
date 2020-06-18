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
    <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <style>
      .footer{
        position : absolute;
      }

      a .logo{
        width: 30%;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <div class="top-left">
        <a  href="{{ url('/') }}"><img class="logo" src="images/logo.png" alt="logo" /></a>
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
        <div class="games">
        @foreach($jeux as $jeu)
          <a href="{{ route('jeux.show', $jeu->id) }}">
            <div class="game">
              <img src="images/jeux/{{$jeu->slug}}" alt="{{ $jeu->nom }}" />
              <p><b>{{ $jeu->nom }}</b></p>
              <p>{{ $jeu->prix }}€</p>
            </div> 
          </a>
        @endforeach   
        </div>
      </div>
      <div class="pages">
        {{ $jeux->appends(request()->input())->links() }}
      </div>
    </div>
    @extends('footer')
  </body>
</html>
