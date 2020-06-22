<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
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
        @else
        <a href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif @endauth
      </div>
      @endif
    </div>
    <div class="formulaire">
        <h1 class="display-4">Modifier un membre</h1>
        <form method="POST" action="{{ route('user.update', $user->id) }}">
            
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nomJeu">Nom du membre</label>
                <input type="text" id="id="nomJeu name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="description">Mail du membre</label>
                <input type="email" class="form-control" name="mail" id="mail" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="image">Nouveau mot de passe</label>
                <input type="password" class="form-control-file" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="pet-select">Choisir le rôle : </label>
                <select class="champs" id="categories" name="role">
                    <option>-- Choisir la valeur --</option>
                    <option value="1">Administrateur</option>
                    <option value="2">Standard</option>
                </select>
               
            </div>

            <div class="form-group">
                <label for="stockJeu">Solde du membre</label>
                <input type="number" class="form-control" name="solde" id="solde" value="{{ $user->solde }}">
            </div>

            <div class="bouton">           
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>
    <nav class="menu">
        <div class="icons">
            <a href="{{ url('/') }}">
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
</body>
</html>