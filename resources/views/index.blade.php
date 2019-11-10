@extends('layouts.main')

@section('title', "Kaamelot'Tse")

@section('content')
    <div class="row carre carousel slide" id="diaporama">
      <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/diapo1.jpg" alt="diapo1" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="images/diapo3.jpg" alt="diapo1" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="images/diapo2.jpg" alt="diapo1" class="d-block w-100">
        </div>              
      </div>
    </div>
    <div class="row carre">
      <p class="m-0 p-2 citation">
          - Et va falloir vous y faire parce qu’à partir de maintenant, on va s’appeler « Les Chevaliers de la Table Ronde » !<br/>
          - Ben heureusement qu’on s’est pas fait construire un buffet à vaisselle !
          <span>Arthur et Léodagan</span>
      </p>
    </div>
    <div class="row">
      <div class="card-columns">
        <div class="card carre">
          <img src="images/affiche.jpg" class="card-img-top" alt="affiche">
          <div class="card-body">
            <h5 class="card-title">La Liste Kaamelot'Tse</h5>
            <p class="card-text">
            Avec la congrégation des saints chevaliers, vous aurez accès aux banquets avec potion de toute puissance à volonté, fruit du pécher, tournois chevalresques ou danse de la promise !<br/>
            Partez à la quête du Sainté Graal et vous avez la certitude de fêtes réussies</p>
          </div>
          <div class="card-body">
            <a href="table_ronde.html" class="card-link">Découvrir La Table ronde</a>
          </div>
        </div>
        <div class="card carre">
          <div class="card-body">
            <h5 class="card-title">Une soirée effroyable</h5>
            <h6 class="card-subtitle mb-2 text-muted">Vendredi 29 novembre</h6>
            <p class="card-text">Une nuit de pleine lune, un quartier désert, un chien qui hurle au loin … Mais qui peut bien frapper à la porte ?
            </p>
          </div>
          <div class="card-body">
            <a href="#" class="card-link">Je suis intéressé</a>
          </div>
        </div>
        <div class="card carre">
          <div class="card-body">
            <h5 class="card-title">Soirée détente</h5>
            <h6 class="card-subtitle mb-2 text-muted">Lundi 7 décembre</h6>
            <p class="card-text">Les cours se succèdent, les projets avancent... Autant de bonnes raisons de marquer une pause pour prendre le temps d’un moment convivial<br/>
            Nous vous attendons nombreux !
            </p>
          </div>
          <div class="card-body">
            <a href="#" class="card-link">Je suis intéressé</a>
          </div>
        </div>
        <div class="card carre">
          <div class="card-body">
            <h5 class="card-title">Nouveau canapé à tester</h5>
            <h6 class="card-subtitle mb-2 text-muted">jeudi 9 décembre</h6>
            <p class="card-text">Lâché seul dans la ville, enfin la belle vie
            Apéros, soirées, et refaire le monde entre barbares
            Pour tester le nouveau canapé
            Portes-ouvertes et pizzas à volonté !
            </p>
          </div>
          <div class="card-body">
            <a href="#" class="card-link">Je suis intéressé</a>
          </div>
        </div>
        <div class="card carre">
          <div class="card-body">
            <h5 class="card-title">Barathon</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
          <div class="card-body">
            <a href="#" class="card-link">Participer</a>
          </div>
        </div>
        <div class="card carre">
          <div class="card-body">
            <h5 class="card-title">Soirée Poker</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
          <div class="card-body">
            <a href="#" class="card-link">Plus d'infos</a>
            <a href="#" class="card-link">Réserver</a>
          </div>
        </div>
      </div>
    </div>
@endsection