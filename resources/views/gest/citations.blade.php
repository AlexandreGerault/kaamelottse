@extends('layouts.main')

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
						@foreach ($citations as $citation)
						<tr>
							<td>{{ $citation->id }}</td>
							<td>{!! nl2br(e($citation->contenu)) !!}</td>
							<td><a href="{{ route('citation.edit',$citation->id) }}">{{ ($citation->auteur)?$citation->auteur:"Inconnu" }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<a class="btn btn-info pull-right" href="{{ route('citation.create') }}">Ajouter une citation<a>
			</div>
        </div>
    </div>
</div>
@endsection
