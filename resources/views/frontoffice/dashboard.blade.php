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
							<div class="card-body bg-warning">
								<h5 class="card-title">Quête du graal</h5>
                                @if (Auth::user()->totalPoints()>1)
                                    <p class="card-text"><b>{{ Auth::user()->totalPoints() }} points</b></p>
                                @else
                                    <p class="card-text"><b>{{ Auth::user()->totalPoints() }} point</b></p>
                                @endif
							</div>
						</div>
                        @foreach($products as $id=>$product)
                            <div class="card @if(!$product->available) bg-light @endif mb-3">
                                @if($product->image) <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}" /> @endif
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
                            <div class="bg-white p-2 carre mb-3" style="width: 100%">
                                Aucune commande n'a encore été trouvée
                            </div>
                        @endif
                        @if(isset($article_bienvenue->content))
                            <div class="carre my-3">
                                {{ $article_bienvenue->content }}
                            </div>
                        @endif
                        @foreach($orders as $order)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{ route('order.show', ['order' => $order]) }}">Commande du {{ $order->created_at }}</a>
                                        @include('includes.delivering_status', ['status' => $order->status])
                                    </h5>
                                    <ul class="list-group list-group-flush">
                                        @foreach($order->items as $orderItem)
                                            <li class="list-group-item d-flex align-items-center">
                                                <span class="badge badge-primary badge-pill mr-4">{{ $orderItem->quantity }}</span>
                                                {{ $orderItem->product->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="card-footer text-muted">
                                    {{ $order->shipping_address }} @empty($order->shipping_address) <a class="btn btn-dark" href="{{ route('order.show', $order) }}">Modifier</a> Veuillez terminer votre commande en complétant les informations manquantes @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('order.create') }}" class="btn btn-primary btn-lg btn-block">Nouvelle commande</a>
                </div>
            </div>
        </div>
    </div>
@endsection
