<p>Bonjour,</p>

<p>Votre facture est désormais disponible dans votre espace personnel</p>

@foreach($codes as $code)
<div class="game">
    <p>Voici le code d'activation du jeu <b>{{$code->Game->nom}}</b> : <b>{{ $code->code }}</b></p>
</div>
@endforeach

<p>Cordialement l'équipe <a href="http://leonlab.herokuapp.com/">LéonLab</a> !</p>
