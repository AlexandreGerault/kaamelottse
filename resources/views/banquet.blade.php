@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 bg-light p-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Nos produits du terroire</h3>
				</div>
                <form method="post" action="{{ route('order.store') }}">
                    @csrf
                    <div class="card-deck d-flex flex-wrap">
                        @foreach ($products as $product)
                            <div class="card mr-2 @if(!$product->available) bg-light @endif my-3" style="min-width: 200px; max-width: 220px;">
                                <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    @cannot('update', $product)
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button onclick="this.parentNode.parentNode.parentNode.querySelector('input[type=number]').stepDown(1); return false"
                                                            class="btn border"
                                                            type="button"
                                                            id="button-addon1"
                                                    >
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>

                                                <input class="form-control text-center no-spins-button" min="0" name="{{ $product->id }}" value="0" type="number">

                                                <div class="input-group-append">
                                                    <button onclick="this.parentNode.parentNode.parentNode.querySelector('input[type=number]').stepUp(1); return false"
                                                            class="btn border"
                                                            type="button"
                                                            id="button-addon1">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <!-- <div class="def-number-input number-input safari_only mb-1">
                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(1); return false" class="btn px-3"></button>
                                            <input class="quantity" min="0" name="{{ $product->id }}" value="0" type="number">
                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp(1); return false" class="btn px-3"></button>
                                        </div> -->
                                    @endcannot
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
                                    @can('update', $product)
                                        <a href="{{ route('product.edit', $product) }}" class="">Editer</a>
                                    @endcan
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        @can('create', App\Models\Product::class)
                            <a class="btn btn-success" href="{{ route('product.create') }}">Ajouter un produit<a>
                        @else
                            <input class="btn btn-info" type="submit" value="Commander"/>
                        @endcan
                    </div>
                </form>
			</div>
        </div>
    </div>
</div>
@endsection
