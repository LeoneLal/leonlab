<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        
            <div class="header">
                <div class="top-left">
                    <img class="logo" src="images/logo.png" alt="logo">
                </div>

                <div class="top-center">
                    <form action="" class="d-flex mr-3">
                        <input type="text" name="q" placeholder="Trouvez votre jeu !">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
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
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
            <div class="main">
                <div class="filter">Du plus petit au plus grand</div>
                <div class="center">
                    <div class="consoles">
                        <h2>Plateformes</h2>
                        <div class="console">
                            <img src="images/pc.png" alt="PC">
                        </div>
                        <div class="console">
                            <img src="images/playstation.png" alt="PlayStation">
                        </div>
                        <div class="console">
                            <img src="images/switch.png" alt="Switch Nintendo">
                        </div>
                        <div class="console">
                            <img src="images/xbox.png" alt="XBox">
                        </div>
                    </div>
                    <div class="games">
                        <div class="game">
                            <img src="images/game.png" alt="jeu">
                            <p><b>Hellblade: Senua's Sacrifice</b></p>
                            <p>30,00€</p>
                        </div>
                        <div class="game">
                            <img src="images/game.png" alt="jeu">
                            <p><b>Nom du jeu</b></p>
                            <p>00,00€</p>
                        </div>
                        <div class="game">
                            <img src="images/game.png" alt="jeu">
                            <p><b>Nom du jeu</b></p>
                            <p>00,00€</p>
                        </div>
                        <div class="game">
                            <img src="images/game.png" alt="jeu">
                            <p><b>Nom du jeu</b></p>
                            <p>00,00€</p>
                        </div> 
                    </div>
                </div>
                <div class="pages">
                    1 2 3 4 ... 
                </div>
            </div>
            <div class="footer">
                <img src="images/facebook.png" alt="">
                <img src="images/instagram.png" alt="">
                <img src="images/twitter.png" alt="">
            </div>
    </body>
</html>
