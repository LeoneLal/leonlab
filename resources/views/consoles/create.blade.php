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
                <img class="logo" src="../images/logo.png" alt="logo" />
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
            <h1 class="display-4">Ajouter une console</h1>
            <form method="POST" action="{{ route('consoles.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nomJeu">Nom de la console</label>
                    <input type="text" id="id="nomJeu"" name="console" class="form-control">
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