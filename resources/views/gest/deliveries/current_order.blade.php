@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row bg-light justify-content-center mb-2">
            <h3 class="panel-title">Commande N°{{ $order->id }}</h3>
        </div>
        <div class="row bg-light mb-2 p-2">
            <div>
                <strong>Nom </strong>{{ $order->customer->name }}
            </div>
            <div class="text-primary">
                <strong>Adresse </strong><em>{{ $order->shipping_address }}</em>
            </div>
            <div>
                <strong>Tel </strong><a href="phone:{{ $order->phone }}" class="text-muted">{{ $order->phone }}</a>
            </div>
            <div>
                <strong>Email </strong><a href="mail:{{ $order->customer->email }}" class="text-muted">{{ $order->customer->email }}</a>
            </div>
            <div>
                <strong>Date Commande </strong>{{ $order->created_at }}
            </div>
        </div>
        <div class="row bg-white mb-2">
            <ul class="col p-2 list-group" style="width: 100%;">
                @foreach ($order->items as $orderItem)
                    <li class="list-group-item @if($orderItem->product->stock<20) list-group-item-danger @elseif($orderItem->product->price*$orderItem->quantity > 10) list-group-item-warning @endif">{{ $orderItem->product->name }} ({{ $orderItem->quantity }} à {{ $orderItem->product->price }}€)</li>
                @endforeach
            </ul>
        </div>
        <div class="row bg-light mb-2 p-2">
            <div>
                <strong>Total </strong>{{ $order->total_price }} €
            </div>
        </div>
        <div class="row bg-light mb-2 p-2">
            @if(Auth::id() == $order->delivery_driver_id)
                <form method="post" action="">
                    <div class="form-group">
                        <label for="message">Envoyer un message</label>
                        <textarea id="message" class="form-control"></textarea>
                    </div>
                </form>
            @else
                <a href="" class="btn btn-primary btn-lg bt-block">Livrer cette commande</a>
            @endif
        </div>
    </div>
@endsection