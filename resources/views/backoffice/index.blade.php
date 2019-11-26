@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="mb-3">Récapitulatif</h5>
                        <ul class="mb-0">
                            <li>Commandes en attente :
                                <e>{{ $nb_penting_orders}}</e>
                            </li>
                            <li>Commandes en livraison : <em>{{ $nb_in_delivering_orders}}</em></li>
                            <li>Commandes livrées : <em>{{ $nb_delivered_orders}}</em></li>
                            <li>Recettes totales : <em>{{ $profits }} €</em></li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Derniers messages reçus</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($last_messages as $message)
                                <li class="list-group-item"><strong>{{ $message->sender->name }}
                                        :</strong> {{ $message->content }}
                                    <br><em><a href="{{ route('backoffice.order.show', $message->order_id) }}">Envoyé
                                            le {{ $message->created_at }}</a></em></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-2 mb-2">
                    <h5>Commandes en attente ({{ $nb_penting_orders}})</h5>
                </div>
                @foreach($pentind_orders as $order)
                    <div class="card mb-3 p-0">
                        <div class="bg-secondary text-white p-2">
                            <strong>{{ $order->customer->name }}</strong> - {{ $order->total_price }}€
                            <a href="{{ route('backoffice.order.show', $order) }}" class="btn btn-info ml-2">Détail</a>
                        </div>
                        <ul class="p-2 list-group">
                            @foreach ($order->items as $orderItem)
                                <li class="list-group-item @if($orderItem->product->stock<20) list-group-item-danger @elseif($orderItem->product->price*$orderItem->quantity > 10) list-group-item-warning @endif">
                                    <span
                                        class="badge badge-secondary">{{ $orderItem->quantity }}</span> {{ $orderItem->product->name }}
                                </li>
                            @endforeach
                        </ul>
                        <div class="p-2 bg-secondary text-white">
                            {{ $order->shipping_address }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="card p-2 mb-2">
                    <h5>Commandes en livraison ({{ $nb_in_delivering_orders }})</h5>
                </div>
                @foreach($in_delivering_orders as $order)
                    <div class="card mb-3 p-0">
                        <div class="bg-warning text-white p-2">
                            <strong>{{ $order->customer->name }}</strong> - {{ $order->total_price }}€
                            <a href="{{ route('backoffice.order.show', $order) }}" class="btn btn-info ml-2">Détail</a>
                        </div>
                        <ul class="p-2 list-group">
                            @foreach ($order->items as $orderItem)
                                <li class="list-group-item @if($orderItem->product->stock<20) list-group-item-danger @elseif($orderItem->product->price*$orderItem->quantity > 10) list-group-item-warning @endif">
                                    <span
                                        class="badge badge-secondary">{{ $orderItem->quantity }}</span> {{ $orderItem->product->name }}
                                </li>
                            @endforeach
                        </ul>
                        <div class="p-2 bg-secondary text-white">
                            {{ $order->shipping_address }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
