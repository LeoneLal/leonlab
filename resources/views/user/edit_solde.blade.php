<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/profil.css') }}" rel="stylesheet" />
    <title>Document</title>
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
    <div class="solde">
        <div class="actual">
            <h2>Solde actuel</h2>
            <p>{{ $user->solde }} €</p>
        </div>
        <div class="nouveau">
            <form method="POST" action="{{ route('user.update_solde') }}">
                
                @csrf
                @method('PUT')

                <label for="Add_solde">
                    Montant à ajouter
                </label>
                <input type="number" name="solde">

                <button type="submit">Valider</button>
            </form>
        </div>
    </div>

</body>
</html>