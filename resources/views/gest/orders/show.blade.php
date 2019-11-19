@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-light p-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Commande N°{{ $order->id }} - <span class="badge">{{ config('enums.order.status.' . $order->status ) }}</span></h3>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="card">
                            <div class="card-body">
                                <h4>Informations du client</h4>
                                <ul>
                                    <li><b>Nom du client : </b> {{ $order->customer->name }}</li>
                                    <li><b>N° de téléphone : </b> {{ $order->customer->phone }}</li>
                                    <li><b>Moyen de paiment</b></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection