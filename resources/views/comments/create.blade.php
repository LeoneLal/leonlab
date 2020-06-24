<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/createGame.css') }}" rel="stylesheet" />
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
        <h1 class="display-4">Rédiger un avis</h1>
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" id="jeu" name="jeu" class="form-control" value="{{ $game->id }}">

            <div class="form-group">
                <label for="note">Note / 5</label>
                <input type="number" min="0" max="5" id="note" name="note" class="form-control">
            </div>

            <div class="form-group">
                <label for="avis">Avis</label>
                <input type="text" class="form-control" name="avis" id="avis">
            </div>

            <div class="bouton">           
                <button type="submit" class="btn">Valider</button>
            </div>
        </form>
    </div>

</body>
</html>