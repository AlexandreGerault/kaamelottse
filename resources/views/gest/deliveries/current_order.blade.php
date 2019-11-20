@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row @if(Auth::id() == $order->delivery_driver_id) bg-warning @else bg-light @endif justify-content-center mb-2">
            <h3 class="panel-title">Commande N°{{ $order->id }}</h3>
        </div>
        <div class="row bg-light mb-2 p-2">
            <p class="m-0">
                @if($order->status == config('ordering.status.PENDING'))
                    <span class="badge badge-primary">En Attente</span>
                @elseif($order->status == config('ordering.status.IN_DELIVERY'))
                    <span class="badge badge-warning">En Cours</span>
                @elseif($order->status == config('ordering.status.DELIVERED'))
                    <span class="badge badge-success">Livré</span>
                @else
                    <span class="badge badge-danger">Commande Annulée</span>
                @endif
                <br>
                <strong>Nom </strong>{{ $order->customer->name }}
                <br>
                <span class="text-danger">
                    <strong>Adresse </strong><span>{{ $order->shipping_address }}</span>
                </span>
                <br>
                <strong>Tel </strong><a href="phone:{{ $order->phone }}" class="text-muted">{{ $order->phone }}</a>
                <br>
                <strong>Email </strong><a href="mail:{{ $order->customer->email }}" class="text-muted">{{ $order->customer->email }}</a>
                <br>
                <strong>Date Commande </strong>{{ $order->created_at }}
                @if($order->shipped_at)
                    <br>
                    <strong>Livré </strong>{{ $order->shipped_at }}
                @endif
            </p>
        </div>
        <div class="row bg-white mb-2">
            <ul class="col p-2 list-group" style="width: 100%;">
                @foreach ($order->items as $orderItem)
                    <li class="list-group-item @if($orderItem->product->stock<20) list-group-item-danger @elseif($orderItem->product->price*$orderItem->quantity > 10) list-group-item-warning @endif"><span class="badge badge-primary">{{ $orderItem->quantity }}</span> {{ $orderItem->product->name }} ({{ $orderItem->product->price }}€ unité)</li>
                @endforeach
            </ul>
        </div>
        <div class="row bg-light mb-2 p-2">
            <div>
                <strong>Total </strong>{{ $order->total_price }} € <span class="badge badge-warning">{{ $order->total_points }} points</span>
            </div>
        </div>
        <div class="row bg-light mb-2 p-2">
            <form method="post" action="{{ route('deliver.message', $order->id) }}" style="width: 100%">
                @csrf
                <div class="form-group">
                    <label for="message">Envoyer un message</label>
                    <textarea id="message" class="form-control" name="content"></textarea>
                </div>
                <input type="submit" class="btn btn-primary btn-sm bt-block" value="Envoyer">
            </form>
			<ul class="list-group list-group-flush">
				@foreach ($order->messages as $message)
					<li class="list-group-item"><strong>{{ $message->sender->name }} :</strong> {{ $message->content }}<br><em>Envoyé le {{ $message->created_at }}</em></li>
				@endforeach
			</ul>
        </div>
        @if(Auth::id() == $order->delivery_driver_id && $order->status != config('ordering.status.DELIVERED'))
            <div class="row bg-light mb-2 p-2">
                <form method="post" action="{{ route('deliver.endDelivery', $order->id) }}" style="width: 100%">
					@csrf
                    <div class="form-group">
                        <label for="message">Methode Paiement</label>
                        <select id="message" class="form-control" name="method_payment">
                            <option value="pumkin">Pumkin</option>
                            <option value="espece">Espèce</option>
                            <option value="cheque">Chèque</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary btn-sm" value="Valider la commande">
                    <a href="{{ route('deliver.cancel', $order->id) }}" class="btn btn-danger  btn-sm">
                        Annuler la commande
                    </a>
                </form>
            </div>
        @elseif(empty($order->delivery_driver_id))
            <div class="row bg-light mb-2 p-2">
                <a href="{{ route('deliver.takeCharge', $order->id) }}" class="btn btn-primary btn-lg bt-block">Prendre en charge cette commande</a>
            </div>
        @else
            <div class="row bg-light mb-2 p-2">
                <div>
                    <strong>Livreur </strong>{{ $order->deliveryDriver->name }}
                </div>
            </div>
        @endif
    </div>
@endsection