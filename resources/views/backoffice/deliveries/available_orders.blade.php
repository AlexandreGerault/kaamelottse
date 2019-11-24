@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center m-2 text-white">
            <h4 class="panel-title">{{ count($currentOrders) }} Commandes en cours</h4>
        </div>
        <div class="row">
            @foreach ($currentOrders as $order)
                <div class="col-md-6 bg-primary mb-3 p-0">
                    <div class="bg-sucess text-white p-2">
                        <strong>{{ $order->customer->name }}</strong> - {{ $order->total_price }}€
                        <a href="{{ route('backoffice.deliver.delivery', $order) }}" class="btn btn-info ml-2">Détail</a>
                    </div>
                    <ul class="p-2 list-group">
                        @foreach ($order->items as $orderItem)
                            <li class="list-group-item @if($orderItem->product->stock<20) list-group-item-danger @elseif($orderItem->product->price*$orderItem->quantity > 10) list-group-item-warning @endif">
                                <span class="badge badge-secondary">{{ $orderItem->quantity }}</span> {{ $orderItem->product->name }}
                            </li>
                        @endforeach
                    </ul>
                    <div class="p-2 bg-light">
                        {{ $order->shipping_address }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center m-2 text-white">
            <h4 class="panel-title">{{ count($availableOrders) }} Commandes disponibles</h4>
        </div>

        @if($availableOrders->count() > 0)
            <div class="row">
                @foreach ($availableOrders as $order)
                    <div class="col-md-6 bg-light mb-2 p-0">
                        <div class="bg-dark text-white p-2">
                            <strong>{{ $order->customer->name }}</strong> - {{ $order->total_price }}€<a
                                    href="{{ route('backoffice.deliver.delivery', $order) }}"
                                    class="btn btn-info ml-2">Voir</a>
                        </div>
                        <div class="p-2 list-group">
                            @foreach ($order->items as $orderItem)
                                <li class="list-group-item @if($orderItem->product->stock<20) list-group-item-danger @elseif($orderItem->product->price*$orderItem->quantity > 10) list-group-item-warning @endif">
                                    <span class="badge badge-primary">{{ $orderItem->quantity }}</span> {{ $orderItem->product->name }}
                                </li>
                            @endforeach
                        </div>
                        <div class="p-2 bg-light">
                            {{ $order->shipping_address }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
