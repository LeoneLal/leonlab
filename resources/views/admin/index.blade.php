<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
    <h2 class="title" >Administration</h2>
    <nav class="navbarre">
        <div class="actual">
            <p>Tableau de bord</p>
            <div class="on"></div>
        </div>
        <a href="{{route('jeux.create')}}"><div>
            <p>Jeux</p>
            <div class="on"></div>
        </div></a>
        <div>
            <p>Membres</p>
            <div class="on"></div>
        </div>
    </nav>
    <div class="graphs">
        <div class="graph">
            {!! $chart->container() !!}
        </div>
        <div class="graph">
        </div>
    </div>






    <!--<a href="{{ route('jeux.create') }}">Ajouter un jeu</a>
    <a href="{{ route('consoles.create') }}">Ajouter une console</a>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}

</body>
</html>