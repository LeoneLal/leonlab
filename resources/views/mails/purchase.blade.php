<h1>Votre facture est désormais disponible dans votre espace personnel</h1>

@foreach($codes as $code)
<div class="game">
<p>Voici le code d'activation du jeu <b>{{$code->Game->nom}}</b> : </p>

<b>{{ $code->code }}</b>
</div>
@endforeach