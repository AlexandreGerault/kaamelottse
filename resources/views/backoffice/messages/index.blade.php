@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <div>
            <h3 class="panel-title mb-5">Messages reçus</h3>

            <table class="table">
                <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Sujet</th>
                    <th>Catégorie</th>
                    <th>Message</th>
                    <th>Depuis</th>
                    <th>Répondu ?</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($messages as $message)
                    <tr  class="text-center">
                        <td>{{ $message->id }}</td>
                        <td class="text-primary"><a href="{{ route('backoffice.message.edit', $message) }}">
                                <strong>{{ $message->subject }}</strong>
                            </a></td>
                        <td>{{ $categories_messages[$message->category] }}</td>
                        <td>{{ $message->content }}</td>
                        <td>
                            <pre>{{ $message->created_at->formatLocalized('%A %d %B %Y') }}</pre>
                        </td>
                        <td>
                            {!! $message->responded ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('backoffice.message.show', $message) }}">Lire</a>
                            <a class="btn btn-primary"
                               href="{{ route('backoffice.message.respond', $message) }}">Répondre</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection