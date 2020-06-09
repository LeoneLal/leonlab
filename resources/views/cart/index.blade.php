<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/panier.css') }}" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
    <div class="header">
      <div class="top-left">
        <a href=""><img class="logo" src="images/logo.png" alt="logo" /></a>
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

        <a href="{{ route('cart.index') }}"><img src="images/panier.png" alt="Panier"> <span class="badge badge-pill badge-dark ">{{ Cart::count()}}</span></a>
      </div>
      @endif
    </div>
    <div class="all">
        <div class="jeux">
            @if (session('success'))
                <div class="alert alert-success">
                {{session('success')}}
                </div>
            @endif    
            @foreach(Cart::content() as $jeu)
            <div class="jeu">
                <div class="left">
                    <img src="images/jeux/{{ $jeu->model->slug}}" alt="{{ $jeu->model->nom }}">
                    <div class="left_m">   
                        <p>{{ $jeu->model->nom }}</p>
                        <div class="logo">
                            <img src="{{ asset('images/ordinateur.png') }}" alt="Console">
                            
                        </div>
                    </div> 
                </div>
                <div class="right">
                <p>{{ $jeu->model->prix }} €</p>
                    <p>1</p>
                    <form action="{{ route('cart.destroy', $jeu->rowId) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>

                    </form>
                </div>
            </div>
            @endforeach

        </div>
        <div class="prix">
       
            <p>{{ Cart::count()}} articles</p>
            <div class="line">
            <p><b>Total</b></p>
            <p><b>{{Cart::subtotal()}}€</b></p>
            </div>
            <div class="line">
            <p>Solde actuel  : </p>
            <p>{{ $user->solde }}€</p>
            </div>
            @if($user->solde - Cart::subtotal() < 0)
            <p>Solde insuffisant</p>
            <a href="{{ route('user.edit_solde') }}"><button>Modifier</button></a>
            @else
            <div class="line">
            <p>Nouveau solde :</p>
            <p>{{ $user->solde - Cart::subtotal() }}€</p>
            </div>
            <form action="{{ route('cart.pay') }}" method="post"> 
                @csrf
                <button type="submit" >Paiement</button>
            </form>
            @endif
        </div>
    </div>
</body>
</html>