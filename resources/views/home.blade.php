@extends('layouts.app')

@section('content')

<div class="left">
<div class="solde">
    <h2>Solde</h2>
    <p>{{ $user->solde }} €</p>
    <a href="{{ route('user.edit_solde') }}"><button>Modifier</button></a>
</div>

<div class="profil">
    <h2>Profil</h2>
    <div class="form">
        <form  method="POST" action="{{ route('user.update_profil') }}">

        @csrf
        @method('PUT')

            <div class="champs">
                <label>Nom</label>
                <input type="text" name="name" value="{{ $user->name }}" />
            </div>

            <div class="champs">
                <label>Mail</label>
                <input type="email" name="email" value="{{ $user->email }}" />
            </div>

            <div class="champs">
                <label>Nouveau mot de passe</label>
                <input type="password" name="password" />
            </div>

            <div class="champs">
                <label>Vérification</label>
                <input type="password" name="verifiation" />
            </div>
            
            <button type="submit">Enregistrer</button>
        </form>
    </div>
</div>

</div>
<div class="right">
    <h2>Achats</h2>
    <div class="jeux">
        <div class="jeu">
            <div class="picture">
                <img src="images/jeux/rust.png" alt="Rust" />
            </div>
            <div class="infos">
                <div class="titre">
                    <h2>RUST</h2>
                </div>
                <div class="date">
                    <p>21/05/2020</p>
                    <p><b>Facture</b></p> <i class="far fa-arrow-to-bottom"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
