@extends('layouts.app')

@section('content')

<div class="left">
@if (session('success'))
        <div class="alert alert-success">
          {{session('success')}}
        </div>
@endif
  <div class="solde">
    <h2>Solde</h2>
    <p>{{ $user->solde }} €</p>
    <a href="{{ route('user.edit_solde') }}"><button>Modifier</button></a>
  </div>

  <div class="profil">
    <h2>Profil</h2>
    <div class="form">
      <form method="POST" action="{{ route('user.update_profil') }}">
        @csrf @method('PUT')

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

        <button type="submit">Enregistrer</button>
      </form>
    </div>
  </div>
</div>
<div class="right">
  <h2>Achats</h2>
  <div class="jeux">
    @foreach( $line as $game)
    <div class="jeu">
      <div class="picture">
        <img src="images/jeux/{{$game->Game->slug}}" alt="Rust" />
      </div>
      <div class="infos">
        <div class="titre">
          <h3>{{$game->Game->nom}}</h3>

          @foreach($existing_comment as $comment)
            @if($comment->jeu_id == $game->jeu_id)
                <p class="hidden">{{ $statut = true }}</p> 
                @break
            
            @else
                {{ $statut = false }}
            
            @endif
          
          @endforeach

          @if($statut == false)
            <a href="{{ route('comments.create', $game->jeu_id) }}">Rédiger un avis</a>

            @else
            <a href="{{ route('comments.edit', $game->jeu_id) }}">Modifier l'avis</a>
          @endif

        </div>
        <div class="date">
          <p>{{ \Carbon\Carbon::parse($game->Card->created_at)->format('d/m/Y')}}</p>
          <a href="{{ route('pdf.download', $game->Card->id) }}" target="blank"
            ><p><b>Facture</b><i class="fas fa-file-download"></i></p
          ></a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
