<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/profil.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('fa/css/all.css') }}" rel="stylesheet"/>
    <title>Document</title>
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
    <div class="solde">
        <div class="actual">
            <h2>Solde actuel</h2>
            <p class="valeur">{{ $user->solde }} €</p>
        </div>
        <div class="nouveau">
            <form method="POST" action="{{ route('user.update_solde') }}">
                
                @csrf
                @method('PUT')

                <div class="plus">
                    <label for="Add_solde">Montant à ajouter : </label>
                    <input type="number" name="solde">
                </div>
                <div class="moins">
                    <label for="Add_solde">Montant à retirer : </label>
                    <input type="number" name="solde_moins">
                </div>

                <button type="submit">Valider</button>
            </form>
        </div>
    </div>

</body>
</html>