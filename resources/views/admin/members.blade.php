<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
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
            <div>
                <p>Tableau de bord</p>
                <div class="on"></div>
            </div>
        </a>
        <a href="{{route('admin.games')}}">
            <div>
                <p>Jeux</p>
                <div class="on"></div>
            </div>
        </a>
        <a href="{{route('admin.members')}}">
            <div class="actual">
                <p>Membres</p>
                <div class="on"></div>
            </div>
        </a>
    </nav>
    <div class="graphs">
        <div class="graph">
            {!! $members_chart->container() !!}
        </div>
    </div>

    <div class="members list-group">
        @foreach($members as $member)
            <div class="member list-group-item">
                <p>Name : {{ $member->name }}</p>
                <a href="{{ route('user.edit', $member->id) }}">
                    <button class="btn btn-success">Modifier</button>
                </a>
                <a href="{{ route('user.delete',  $member->id) }}">
                    <button class="btn btn-danger">Supprimer</button>
                </a>
            </div>
        @endforeach
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $members_chart->script() !!}
    
</body>
</html> 