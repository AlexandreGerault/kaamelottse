@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-light p-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Liste des produits</h3>
                    </div>

                    @can('create', Order::class)
                        <p>Vous pouvez commander</p>
                    @else
                        Vous ne pouvez pas commander
                    @endcan

                    <div class="card-deck d-flex flex-wrap">
                        @foreach ($products as $product)
                            <div class="card mr-2 @if(!$product->available) bg-light @endif my-3"
                                 style="min-width: 200px; max-width: 220px;">
                                <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text" style="text-align: right">
                                        <small class="text-muted">{{ $product->price }} €</small>
                                        <span class="badge badge-warning ml-2">{{ $product->points }}
                                            @if ($product->points>1)
                                                points
                                            @else
                                                point
                                            @endif
                                    </span>
                                        @if(!$product->available or $product->stock < 1)
                                            <span class="badge badge-danger">Non disponible</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
