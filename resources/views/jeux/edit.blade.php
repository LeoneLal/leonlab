<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/createGame.css') }}" rel="stylesheet">
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
    <div class="formulaire">
        <h1 class="display-4">Modifier un jeu</h1>
        <form method="POST" action="{{ route('jeux.store') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nomJeu">Nom du jeu</label>
                <input type="text" id="id="nomJeu name="name" class="form-control" value="{{ $game->nom }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" name="description" id="description" rows="6" cols="35">{{ $game->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image du jeu</label>
                <img src="{{ asset('images/jeux/$game->slug')}}" alt="{{ $game->nom }}" />
                <input type="file" class="form-control-file" name="picture" id="image">
            </div>

            <div class="form-group">
                <label for="pet-select">Choisir la console : </label>
                <select class="champs" id="categories" name="console">
                </select>
            </div>

            <div class="form-group">
                <label for="prixJeux">Prix</label>
                <input type="text" class="form-control" name="prix" id="prixJeux" value="{{ $game->prix }}">
            </div>

            <div class="form-group">
                <label for="stockJeu">Stock</label>
                <input type="number" class="form-control" name="stock" id="stockJeu" value="{{ $game->stock }}">
            </div>

            <div class="bouton">           
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>

</body>
</html>