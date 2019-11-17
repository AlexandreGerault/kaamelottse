@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 bg-light p-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Préparer son banquet</h3>
				</div>
                <div class="card-group">
                    @foreach ($produits as $produit)
                        <div class="card" style="max-width: 200px;">
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
                                </p>
                                @if(Auth::user() && Auth::user()["role"]>0)
                                    <a href="{{ route('produit.update', $produit->id) }}" class="">Editer</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-2">
                    @if(Auth::user() && Auth::user()["role"]>0)
                        <a class="btn btn-info pull-right" href="{{ route('produit.create') }}">Ajouter un produit<a>
                    @endif
                </div>
			</div>
        </div>
    </div>
</div>
@endsection
