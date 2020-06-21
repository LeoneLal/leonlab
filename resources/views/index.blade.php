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
        <a href="{{ route('cart.index') }}"><img src="images/panier.png" alt="Panier"> <span class="badge badge-pill badge-dark ">{{ Cart::count()}}</span></a>
        @else
        <a href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif @endauth
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
          <div class="title">
            <h2>Plateformes</h2>
          </div>
          <div class="all_c">
            @foreach($consoles as $console)   
              <a href={{route('consoles.search', $console->id)}}>   
                <div class="console">
                  <div class="console-img">
                    <img src="images/{{ $console->slug }}" alt="{{ $console->console }}" />
                  </div>
                  <p><b>{{ $console->console }}</b></p>
                </div>
              </a>
            @endforeach
          </div>
        </div>
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
      {{ $jeux->links() }}
      </div>
      
    </div> 
    <div class="footer">
  <img
    src="{{ asset('images/facebook.png') }}"
    alt="Facebook"
    class="social_media"
  />
  <img
    src="{{ asset('images/instagram.png') }}"
    alt="Instagram"
    class="social_media"
  />
  <img
    src="{{ asset('images/twitter.png') }}"
    alt="Twitter"
    class="social_media"
  />
</div>
    <nav class="menu">
        <div class="icons">
            <a href="index.html">
                <div class="icon active">
                    <p><i class="fas fa-home"></i></p>
                    <span>Home</span>
                </div>
            </a>
            @if (Route::has('login'))
             @auth
             <a href="{{ url('/panier') }}">
                <div class="icon">
                    <p><i class="fas fa-shopping-cart"></i></p>
                    <span>Panier</span>
                </div>
            </a>
            <a href="{{ url('/home') }}">
                <div class="icon">
                    <p><i class="fas fa-user"></i></p>
                    <span>Profile</span>
                </div>
            </a>
             @else
            <a href="{{ route('login') }}">
                <div class="icon">
                    <p><i class="fas fa-sign-in-alt"></i></p>
                    <span>Sign in</span>
                </div>
            </a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">
                <div class="icon">
                    <p><i class="fas fa-user-plus"></i></p>
                    <span>Sign up</span>
                </div>
            </a>
          @endif @endauth
        </div>
        @endif
    </nav>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </body>
</html>
