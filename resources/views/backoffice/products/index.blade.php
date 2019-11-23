@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <h3 class="mb-5">Liste des produits</h3>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Points</th>
                <th>Stock</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td class="text-primary"><a href="{{ route('backoffice.product.edit', $product) }}">
                            @if($product->available)
                                <strong>{{ $product->name }}</strong>
                            @else
                                {{ $product->name }}
                            @endif
                        </a></td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->points }}</td>
                    <td>
                        <pre>{{ $product->stock }}</pre>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-info pull-right" href="{{ route('backoffice.product.create') }}">Ajouter un produit</a>
    </div>
@endsection
