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
                        @foreach ($products as $product)
                            <div class="card mr-2 @if(!$product->available) bg-light @endif" style="max-width: 220px;">
                                <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    @if(!$modif)
                                        <div class="def-number-input number-input safari_only mb-1">
                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(1); return false" class="minus"></button>
                                            <input class="quantity" min="0" name="{{ $product->id }}" value="0" type="number">
                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp(1); return false" class="plus"></button>
                                        </div>
                                    @endif
                                    <p class="card-text" style="text-align: right">
                                        <small class="text-muted">{{ $product->price }} €</small>
                                        <span class="badge badge-warning ml-2">{{ $product->points }}
                                            @if ($product->points>1)
                                                points
                                            @else
                                                point
                                            @endif
                                        </span>
                                        @if(!$product->available or $product->stock)
                                            <span class="badge badge-danger">Non disponible</span>
                                        @endif
                                    </p>
                                    @if($modif)
                                        <a href="{{ route('product.update', $product->id) }}" class="">Editer</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        @if($modif)
                            <a class="btn btn-success" href="{{ route('product.create') }}">Ajouter un produit<a>
                        @else
                            <input class="btn btn-info" type="submit" value="Commander"/>
                        @endif
                    </div>                    
                </form>
			</div>
        </div>
    </div>
</div>
@endsection
