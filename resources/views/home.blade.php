@extends('layouts.app')

@section('content')
<div class="left">
<div class="solde">
    <h2>Solde</h2>
    <p>15 €</p>
    <button>Ajouter</button>
</div>

<div class="profil">
    <h2>Profil</h2>
    <div class="form">
        <form>
            <div class="champs">
                <label>Nom</label>
                <input type="text" placeholder="Lalloué" />
            </div>

            <div class="champs">
                <label>Prenom</label>
                <input type="text" placeholder="Lalloué" />
            </div>

            <div class="champs">
                <label>Mail</label>
                <input type="email" placeholder="Lalloué" />
            </div>

            <div class="champs">
                <label>Date de naissance</label>
                <input type="date" />
            </div>

            <div class="champs">
                <label>Nouveau mot de passe</label>
                <input type="password" placeholder="Lalloué" />
            </div>

            <div class="champs">
                <label>Vérification</label>
                <input type="password" placeholder="Lalloué" />
            </div>
            
            <button>Enregistrer</button>
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
@endsection
