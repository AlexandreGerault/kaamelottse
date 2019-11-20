@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-light p-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">

                        <h3 class="panel-title">
                            Commande N°{{ $order->id }} -
                            <span class="badge">{{ config('enums.order.status.' . $order->status ) }}</span>
                        </h3>
                        <div class="d-flex flex-wrap">
                            <a class="btn btn-primary mr-3" href="{{ route('order.edit', ['order' => $order]) }}">
                                Éditer la commande manuellement
                            </a>
                            <form class="form-inline" method="POST" action="{{ route('order.destroy', ['order' => $order]) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger delete-user" value="Supprimer la commande" />
                            </form>
                        </div>

                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="card m-3">
                            <div class="card-body">
                                <h4>Informations du client</h4>
                                <ul>
                                    @if(isset($order->customer))
                                    <li><b>Nom du client : </b> {{ $order->customer->name }}</li>
                                    @endif
                                    <li><b>N° de téléphone : </b> {{ $order->phone }}</li>
                                    @if($order->method_payment !== null)
                                        <li><b>Moyen de paiment : </b> {{ $order->method_payment }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="card m-3">
                            <div class="card-body">
                                <h4>Informations de livraison</h4>
                                <ul>
                                    @if(isset($order->deliveryDriver))
                                    <li><b>Nom du livreur : </b> {{ $order->deliveryDriver->name }}</li>
                                    @endif
                                    <li><b>Adresse de livraison :</b> {{ $order->shipping_address }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card m-3">
                            <div class="card-body">
                                <h4 class="mb-4">Produits</h4>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Produit</th>
                                        <th class="text-center">Quantité</th>
                                        <th class="text-center">Prix unité</th>
                                        <th class="text-center">Prix</th>
                                        <th class="text-center">Point à l'unité</th>
                                        <th class="text-center">Points</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($order->items as $orderItem)
                                        <tr>
                                            <td class="text-primary">
                                                <a href="{{ route('product.show', $orderItem->product) }}">
                                                    {{ $orderItem->product->name }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $orderItem->quantity }}
                                            </td>
                                            <td>
                                                {{ $orderItem->product->price }} €
                                            </td>
                                            <td>
                                                {{ $orderItem->product->price * $orderItem->quantity }} €
                                            </td>
                                            <td class="text-center">
                                                {{ $orderItem->product->points }}
                                            </td>
                                            <td class="text-center">
                                                {{ $orderItem->product->points * $orderItem->quantity }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection