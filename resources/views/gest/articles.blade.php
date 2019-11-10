@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 bg-light p-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Liste des articles</h3>
				</div>
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
							<td class="text-primary"><a href="{{ route('article.edit',$article->id) }}">
								@if($article->visible)
									<strong>{{ $article->titre }}</strong>
								@else
									{{ $article->titre }}									
								@endif
							</a></td>
							<td>{{ $article->priorite }}</td>
							@if ($article->user)
								<td>{{ $article->user->name }}</td>
							@else
								<td>{{ $article->user }}</td>
							@endif
							<td><pre>{{ $article->created_at }}</pre></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<a class="btn btn-info pull-right" href="{{ route('article.create') }}">Ajouter un article<a>
			</div>
        </div>
    </div>
</div>
@endsection
