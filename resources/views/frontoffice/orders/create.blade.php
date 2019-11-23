@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-light p-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Préparer son pc</h3>
                    </div>
                    <form method="post" action="{{ $action }}">
                        @csrf
                        <div class="card-deck d-flex flex-wrap">
                            @foreach ($products as $product)
                                <div class="card mr-2 @if(!$product->available) bg-light @endif my-3"
                                     style="min-width: 200px; max-width: 220px;">
                                     @if(!empty($product->image))
                                        <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}">
                                     @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">{{ $product->description }}</p>
                                            @if(!$product->available or $product->stock<1)
                                                <span class="badge badge-danger">Non disponible</span>
                                            @endif
                                        @if($product->available and $product->stock>0)
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button onclick="this.parentNode.parentNode.parentNode.querySelector('input[type=number]').stepDown(1); return false"
                                                            class="btn border"
                                                            type="button"
                                                            id="button-addon1">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>

                                                <input class="form-control text-center no-spins-button" min="0"
                                                       name="{{ $product->id }}" value="0" type="number">

                                                <div class="input-group-append">
                                                    <button onclick="this.parentNode.parentNode.parentNode.querySelector('input[type=number]').stepUp(1); return false"
                                                            class="btn border"
                                                            type="button"
                                                            id="button-addon1">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
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
                                        </p>
                                        @can('update', $product)
                                            <a href="{{ route('product.edit', $product) }}" class="">Editer</a>
                                        @endcan
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-2">
                            <input class="btn btn-primary" type="submit" value="Commander"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
