@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <h3 class="mb-5">Liste des articles</h3>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Priorité</th>
                <th>Utilisateur</th>
                <th>Creation</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td class="text-primary"><a href="{{ route('backoffice.article.edit', $article) }}">
                            @if($article->published)
                                <strong>{{ $article->title }}</strong>
                            @else
                                {{ $article->title }}
                            @endif
                        </a></td>
                    <td>{{ $article->priority }}</td>
                    <td>{{ $article->user->name }}</td>
                    <td>
                        <pre>{{ $article->created_at }}</pre>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-info pull-right" href="{{ route('article.create') }}">Ajouter un article</a>
    </div>
@endsection
