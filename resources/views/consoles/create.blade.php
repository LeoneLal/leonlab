<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/createGame.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" /> 
        <link href="{{ asset('fa/css/all.css') }}" rel="stylesheet"/>
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
        <a href="{{ route('cart.index') }}"><img src="{{ asset('images/panier.png') }}" alt="Panier"> <span class="badge badge-pill badge-dark ">{{ Cart::count()}}</span></a>
        @else
        <a href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif @endauth
      </div>
      @endif
    </div>

        <div class="formulaire">
            <h1 class="display-4">Ajouter une console</h1>
            <form method="POST" action="{{ route('consoles.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nomJeu">Nom de la console</label>
                    <input type="text" id="nomJeu" name="console" class="form-control">
                </div>

                <div class="form-group">
                    <label for="image">Image du jeu</label>
                    <input type="file" class="form-control-file" name="picture" id="image">
                </div>

                <div class="bouton">           
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>
        </div>

    </body>
</html> 