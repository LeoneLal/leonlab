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
        <img class="logo" src="images/logo.png" alt="logo" />
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
    <div class="formulaire">
        <h1 class="display-4">Ajouter un jeu</h1>
        <form method="POST" action="{{ route('jeux.store') }}">
              @csrf
            <div class="form-group">
                <label for="nomJeu">Nom du jeu</label>
                <input type="text" id="id="nomJeu"" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description">
            </div>

            <div class="form-group">
                <label for="image">Image du jeu</label>
                <input type="file" class="form-control-file" name="picture" id="image">
            </div>

            <div class="form-group">
                <label for="pet-select">Choisir la console : </label>
                <select class="champs" id="categories" name="console">
                    <option value="">--Choisir une console--</option>
                    @foreach($consoles as $console)
                    <option value="{{$console->id}}">{{$console->console}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="prixJeux">Prix</label>
                <input type="text" class="form-control" name="prix" id="prixJeux">
            </div>

            <div class="bouton">           
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>

</body>
</html>