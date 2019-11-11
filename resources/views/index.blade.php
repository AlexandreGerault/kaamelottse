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
            @foreach ($articles as $article)
                <div class="card carre">
                    @if ($article->image)
                        <img src="{{ $article->image }}" class="card-img-top" alt="logo">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{ $article->titre }}</h5>
                      <p class="card-text">{{ $article->contenu }}</p>
                    </div>
                    @if ($article->nom_lien)
                        <div class="card-body">
                          <a href="{{ $article->adresse_lien }}" class="card-link">{{ $article->nom_lien }}</a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection