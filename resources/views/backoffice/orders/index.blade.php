@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <h3 class="mb-5">Dernières commandes</h3>
        <table class="table">
            <thead>
            <tr class="text-center">
                <th>Client</th>
                <th>Statut</th>
                <th>Prix total</th>
                <th>Points totaux</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td class="align-middle text-primary">
                        @if(isset($order->customer))
                            <strong>{{ $order->customer->name }}</strong>
                        @else
                            Aucun client
                        @endif
                    </td>
                    <td class="align-middle text-center">
                        {{ config('enums.order.status.' . $order->status) }}
                    </td>
                    <td class="align-middle">
                        {{ $order->total_price }} €
                    </td>
                    <td class="text-center align-middle">
                        {{ $order->total_points }}
                    </td>
                    <td class="align-middle">
                        {{ $order->phone }}
                    </td>
                    <td class="text-center">
                        <a class="btn btn-primary d-block mb-2"
                           href="{{ route('backoffice.order.show', $order) }}">
                            Voir
                        </a>
                        <a class="btn btn-primary d-block"
                           href="{{ route('backoffice.order.show', $order) }}">
                            Annuler
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>
@endsection