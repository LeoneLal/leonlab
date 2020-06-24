<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    <link href="{{ asset('fa/css/all.css') }}" rel="stylesheet"/>
    <title>Admin panel</title>
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
    <h2 class="title" >Administration</h2>
    <nav class="navbarre">
        <a href="{{route('admin.index')}}">
            <div class="actual">
                <i class="fas fa-hand-holding-usd"></i>
                <p>Tableau de bord</p>
                <div class="on"></div>
            </div>
        </a>
        
        <a href="{{route('admin.games')}}">
            <div>
                <i class="fas fa-dice"></i>
                <p>Jeux</p>
                <div class="on"></div>
            </div>
        </a>

        <a href="{{route('admin.consoles')}}">
            <div>
                <i class="fas fa-gamepad"></i>
                <p>Consoles</p>
                <div class="on"></div>
            </div>
        </a>

        <a href="{{route('admin.members')}}">
            <div>
                <i class="fas fa-users"></i>
                <p>Membres</p>
                <div class="on"></div>
            </div>
        </a>
    </nav>
    <div class="graphs">
        <div class="graph">
            {!! $games_chart->container() !!}
        </div>
    </div>

    <div class="games list-group">
        <h2>Jeux</h2>
        <a href="{{ route('jeux.create') }}">
            <button class="btn btn-info">Ajouter un jeu</button>
        </a>
        <a href="{{ route('admin.opinion') }}">
            <button class="btn btn-info">Avis</button>
        </a>
        @foreach($games as $game)
            <div class="game list-group-item">
                <p>{{$game->nom}}</p>
                <p>Stock : {{ $game->stock }}</p>
                @foreach($games_opinions as $opinion)
                    @if($opinion->jeu_id == $game->id )
                        <p>Note :  {{ number_format($opinion->note, 2)}}/ 5</p>
                        @break
                    @endif
                @endforeach
                
                <a href="{{ route('jeux.edit', $game->id) }}">
                    <button class="btn btn-success">Modifier</button>
                </a>
                <a href="{{ route('jeux.delete',  $game->id) }}">
                    <button class="btn btn-danger">Supprimer</button>
                </a>
            </div>
        @endforeach
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $games_chart->script() !!}

</body>
</html> 