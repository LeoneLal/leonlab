<form method='GET' action="{{ route('jeux.search')}}" class="d-flex mr-3">
    <input type="text" name="q" placeholder="Trouvez votre jeu !" />
    <button type="submit" class="btn btn-info">
        <i class="fas fa-search"></i>
    </button>
</form>