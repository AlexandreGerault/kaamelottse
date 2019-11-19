@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row bg-light justify-content-center m-2">
            <h4 class="panel-title">{{ count($currentOrders) }} Commandes en cours</h4>
        </div>
        <div class="row">
            @foreach ($currentOrders as $order)
                <div class="col-md-6 bg-light mb-2 p-0">
                    <div class="bg-sucess text-white p-2">
                        <strong>{{ $order->customer->name }}</strong> - {{ $order->total_price }}€<a href="{{ route('deliver.delivery', $order->id) }}" class="btn btn-info ml-2">Voir</a>
                    </div>
                    <ul class="p-2 list-group">
                        @foreach ($order->items as $orderItem)
                            <li class="list-group-item @if($orderItem->product->stock<20) list-group-item-danger @elseif($orderItem->product->price*$orderItem->quantity > 10) list-group-item-warning @endif">{{ $orderItem->product->name }} ({{ $orderItem->quantity }} commandé)</li>
                        @endforeach
                    </ul>
                    <div class="p-2 bg-light">
                        {{ $order->shipping_address }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row bg-light justify-content-center m-2">
            <h4 class="panel-title">{{ count($availlableOrders) }} Commandes disponibles</h4>
        </div>
        <div class="row">
            @foreach ($availlableOrders as $order)
                <div class="col-md-6 bg-light mb-2 p-0">
                    <div class="bg-dark text-white p-2">
                        <strong>{{ $order->customer->name }}</strong> - {{ $order->total_price }}€<a href="{{ route('deliver.delivery', $order->id) }}" class="btn btn-info ml-2">Voir</a>
                    </div>
                    <div class="p-2 list-group">
                        @foreach ($order->items as $orderItem)
                            <li class="list-group-item @if($orderItem->product->stock<20) list-group-item-danger @elseif($orderItem->product->price*$orderItem->quantity > 10) list-group-item-warning @endif">{{ $orderItem->product->name }} ({{ $orderItem->quantity }} commandé)</li>
                        @endforeach
                    </div>
                    <div class="p-2 bg-light">
                        {{ $order->shipping_address }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection