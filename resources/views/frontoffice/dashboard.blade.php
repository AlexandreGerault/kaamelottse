@extends('layouts.main')

@section('title', "Kaamelot'Tse")

@section('content')
    <div class="row carre">
        <h2 class="m-0 p-2">
            Bonjour {{ Auth::user()->name }}
        </h2>
    </div>
    <div class="row carre">
        @include('includes.quote')
    </div>
    <div class="row">
        <div class="container panel panel-primary">
            <div class="row">
                <div class="col-sm-3">
					<div class="">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Quête du graal</h5>
								<p class="card-text">2012 points</p>
							</div>
						</div>
                        @foreach($products as $id=>$product)
                            <div class="card @if(!$product->available) bg-light @endif mb-3">
                                <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}" />
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="card-group mb-3 commandes">
                        @if(sizeof($orders)<1)
                            <div class="bg-white p-2 carre" style="width: 100%">
                                Aucune commande n'a encore été trouvée
                            </div>
                        @endif
                        @if(isset($article_bienvenue->content))
                            <div class="carre mt-3">
                                {{ $article_bienvenue->content }}
                            </div>
                        @endif
                        @foreach($orders as $order)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Commande du {{ $order->created_at }}
                                        @if($order->status == config('ordering.status.PENDING'))
                                            <span class="badge badge-primary">En Attente</span>
                                        @elseif($order->status == config('ordering.status.IN_DELIVERY'))
                                            <span class="badge badge-warning">En Cours</span>
                                        @elseif($order->status == config('ordering.status.DELIVERED'))
                                            <span class="badge badge-success">Livré</span>
                                        @else
                                            <span class="badge badge-danger">Commande Annulée</span>
                                        @endif
                                    </h5>
                                    <ul class="list-group list-group-flush">
                                        @foreach($order->items as $orderItem)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                              <img src="images/produits/cookie.png" alt="." class="mr-1">{{ $orderItem->name }}
                                              <span class="badge badge-primary badge-pill">{{ $orderItem->quantity }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="card-footer text-muted">
                                    {{ $order->shipping_address }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="/banquet" class="btn btn-secondary btn-lg btn-block">Nouvelle commande</a>
                </div>
            </div>
        </div>
    </div>
@endsection