@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 bg-light p-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Préparer son pc</h3>
				</div>
                <form method="post" action="#">
                    <div class="card-deck">
                        @foreach ($produits as $produit)
                            <div class="card mr-2 @if(!$produit->disponible) bg-light @endif" style="max-width: 220px;">
                                <img class="card-img-top" src="{{ $produit->image }}" alt="{{ $produit->nom }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $produit->nom }}</h5>
                                    <p class="card-text">{{ $produit->description }}</p>
                                    <p class="card-text" style="text-align: right">
                                        <small class="text-muted">{{ $produit->prix }} €</small>
                                        <span class="badge badge-warning ml-2">{{ $produit->points }} 
                                            @if ($produit->points>1)
                                                points
                                            @else
                                                point
                                            @endif
                                        </span>
                                        @if(!$produit->disponible or $produit->stock)
                                            <span class="badge badge-danger">Non disponible</span>
                                        @endif
                                    </p>
                                    <div class="def-number-input number-input safari_only">
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(1); return false" class="minus"></button>
                                        <input class="quantity" min="0" name="{{ $produit->id }}" value="0" type="number">
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp(1); return false" class="plus"></button>
                                    </div>
                                    @if(Auth::user() && Auth::user()["role"]>0)
                                        <a href="{{ route('produit.update', $produit->id) }}" class="">Editer</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <input class="btn btn-info" type="submit" value="Commander">
                        @if(Auth::user() && Auth::user()["role"]>0)
                            <a class="btn btn-success" href="{{ route('produit.create') }}">Ajouter un produit<a>
                        @endif
                    </div>                    
                </form>
			</div>
        </div>
    </div>
</div>
@endsection
