@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-light p-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dernières commandes</h3>
                    </div>
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
                                    <strong>{{ $order->customer->name }}</strong>
                                </td>
                                <td class="align-middle">
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
                                    <a class="btn btn-primary d-block mb-2" href="{{ route('order.show', $order) }}">
                                        Voir
                                    </a>
                                    <a class="btn btn-primary d-block" href="{{ route('order.show', $order) }}">
                                        Annuler
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection