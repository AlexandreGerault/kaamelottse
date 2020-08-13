@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <h3 class="mb-5">Liste des citations</h3>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Citation</th>
                <th>Auteur</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($quotes as $quote)
                <tr>
                    <td>
                        <a href="{{ route('backoffice.quote.edit', $quote) }}">
                            {{ $quote->id }}
                        </a>
                    </td>
                    <td>{!!  substr(e($quote->content), 0, 50) . '...' !!}</td>
                    <td>
                        {{ ($quote->author) ? $quote->author : "Inconnu" }}
                    </td>
                    <td>
                        <a href="{{ route('backoffice.quote.edit', $quote) }}" class="btn btn-primary">
                            Voir
                        </a>
                        <form class="form-inline d-inline" action="{{ route('backoffice.quote.destroy', $quote) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a class="btn btn-info pull-right" href="{{ route('backoffice.quote.create') }}">Ajouter une citation</a>
    </div>
@endsection
