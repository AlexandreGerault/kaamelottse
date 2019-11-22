@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
					Articles (nouvelles et évènements)
				</div>

                <div class="card-body">
                    <form method="POST" action="{{ $action }}">
                        @csrf
						@if(isset($method)) @method($method) @endif

                        <div class="form-group">
                            <label for="title">Titre</label>
							<input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $article->title) }}" required autocomplete="name" maxlength="150" autofocus>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Indication pratique - ex: Le 24/11/2019 au Clapier</label>
							<input id="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle', $article->subtitle) }}">

							@error('subtitle')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                        </div>

                        <div class="form-group">
                            <label for="content" >Contenu article</label>
							<textarea class="form-control" id="content" name="content" rows="5" maxlength="5000">{{ old('content', $article->content) }}</textarea>
							
							@error('content')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                        </div>

                        <div class="form-group">
							<div class="row">
								<div class="col-8">
									<label for="image" >Lien Image associée (optionnel)</label>
									<input id="image" type="url" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image',$article->image) }}">

									@error('image')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="col-4">
									<label for="priority">Priorité d'affichage</label>
									<input id="priority" type="number" class="form-control @error('priority') is-invalid @enderror" name="priority" value="{{ old('priority', $article->priority) }}">

									@error('priority')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
                        </div>

                        <div class="form-group">
							<div class="row">
								<div class="col-7">
									<label for="slug" >Label lien (fac.)</label>
									<input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $article->slug) }}">

									@error('slug')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="col-5">
									<label for="link" >Adresse lien (fac.)</label>
									<input id="link" type="url" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link', $article->link) }}">

									@error('link')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
                        </div>

                        <div class="form-group">
							<div class="form-check">
								<input id="published" name="published" class="form-check-input" type="checkbox" @if(old('published', $article->published)) checked @endif id="defaultCheck1">
								<label for="published" >Rendre l'article visible</label>
								
							</div>
							@error('published')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Valider') }}
                                </button>
                                <a href="{{ route('backoffice.order.index') }}" class="btn btn-secondary">
                                    {{ __('Annuler') }}
                                </a>
								@if(isset($id) && Auth::user()["role"]>2)
									<a class="btn btn-danger" href="{{ route('article.destroy', $article) }}" onclick="event.preventDefault();
														 document.getElementById('destroy-form').submit();">Supprimer</a>
								@endif
                            </div>
                        </div>
                    </form>
					@if(isset($id) && true)
						<form id="destroy-form" action="{{ route('article.destroy', $article) }}" method="POST" style="display: none;">
							@method('DELETE')
							@csrf
						</form>
					@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
