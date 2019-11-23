@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-light p-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vos commandes</h3>
                    </div>
                    @if($orders->count() > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Status</th>
                                <th>Montant</th>
                                <th>Commandé le</th>
                                <th>Livraison</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>@include('includes.delivering_status', ['status' => $order->status])</td>
                                    <td>{{ $order->total_price }} €</td>
                                    <td>{{ $order->created_at->formatLocalized('%A %d %B %Y') }}</td>
                                    <td>
                                        @if($order->status == config('ordering.status.DELIVERED') && $order->shipped_at !== null)
                                            {{ $order->shipped_at }}
                                        @else
                                            Commande non livrée
                                        @endif
                                    </td>
                                    <td><a class="btn btn-primary"
                                           href="{{ route('order.show', ['order' => $order]) }}">Voir</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Vous n'avez passé aucune commande.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection