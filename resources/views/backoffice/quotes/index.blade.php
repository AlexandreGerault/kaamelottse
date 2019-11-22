@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-light p-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Liste des citations</h3>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Citation</th>
                            <th>Auteur</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($quotes as $quote)
                            <tr>
                                <td>{{ $quote->id }}</td>
                                <td>{!! nl2br(e($quote->content)) !!}</td>
                                <td>
                                    <a href="{{ route('quote.edit', $quote) }}">
                                        {{ ($quote->author) ? $quote->author : "Inconnu" }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-info pull-right" href="{{ route('quote.create') }}">Ajouter une citation<a>
                </div>
            </div>
        </div>
    </div>
@endsection
