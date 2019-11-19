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
                            <tr>
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
                                <td class="text-primary">
                                    <strong>{{ $order->customer->name }}</strong>
                                </td>
                                <td>
                                    {{ $order->status }}
                                </td>
                                <td>
                                    {{ $order->total_price }}
                                </td>
                                <td>
                                    {{ $order->total_points }}
                                </td>
                                <td>
                                    {{ $order->phone }}
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('order.show', $order) }}">
                                        Voir
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('order.show', $order) }}">
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