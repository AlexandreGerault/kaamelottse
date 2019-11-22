@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-light p-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vos prises de contact</h3>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Sujet</th>
                            <th>Catégorie</th>
                            <th>Message</th>
                            <th>Depuis</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td class="text-primary"><a href="{{ route('message.edit', $message) }}">
                                        <strong>{{ $message->subject }}</strong>
                                    </a></td>
                                <td>{{ $categories_messages[$message->category] }}</td>
                                <td>{{ $message->content }}</td>
                                <td>
                                    <pre>{{ $message->created_at }}</pre>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('message.show', $message) }}">Lire</a>
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