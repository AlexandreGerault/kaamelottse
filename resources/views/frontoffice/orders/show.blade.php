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

                    </div>
                    <div class="d-flex flex-wrap">
                        @if(isset($order->customer) || $order->phone !== null || $order->method_payment !== null)
                        <div class="card m-3">
                            <div class="card-body">
                                <h4>Vos informations</h4>
                                <ul>
                                    @if(isset($order->customer))
                                        <li><b>Nom du client : </b> {{ $order->customer->name }}</li>
                                    @endif
                                    @if($order->phone !== null)
                                        <li><b>N° de téléphone : </b> {{ $order->phone }}</li>
                                    @endif
                                    @if($order->method_payment !== null)
                                        <li><b>Moyen de paiment : </b> {{ $order->method_payment }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if(isset($order->deliveryDriver) || $order->shipping_address !== null)
                        <div class="card m-3">
                            <div class="card-body">
                                <h4>Informations de livraison</h4>
                                <ul>
                                    @if(isset($order->deliveryDriver))
                                        <li><b>Nom du livreur : </b> {{ $order->deliveryDriver->name }}</li>
                                    @endif
                                    @if($order->shipping_address !== null)
                                    <li><b>Adresse de livraison :</b> {{ $order->shipping_address }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @endif

                        @can('update', $order)
                        <form class="card m-3" action="{{ route('order.update', $order) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <h4>Renseigner des informations de contact</h4>

                                <div class="form-group">
                                    <label for="customer_phone">Téléphone de contact</label>
                                    <input type="tel" class="form-control" name="phone" id="customer_phone" value="{{ old('customer_phone', $order->phone) }}">
                                </div>
                                <div class="form-group">
                                    <label for="shipping_address">Adresse de livraison</label>
                                    <input type="text" class="form-control" name="shipping_address" id="shipping_address" value="{{ old('shipping_address', $order->shipping_address) }}">
                                </div>

                                <input type="submit" class="btn btn-primary" value="Terminer la commande"/>
                            </div>
                        </form>
                        @endcan

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
                                                {{ $orderItem->product->name }}
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

                        <div class="card m-3">
                            <div class="card-body">
                                <p>
                                    <b>Prix total : </b> {{ $order->total_price }} €<br />
                                    <b>Points totaux : </b> {{$order->total_points}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
