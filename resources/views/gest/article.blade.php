@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Articles (nouvelles et évènements)</div>

                <div class="card-body">
                    <form method="POST" action="{{ $action }}">
                        @csrf
						@if(isset($method))
							@method($method)
						@endif

                        <div class="form-group">
                            <label for="titre">Titre</label>
							<input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre', $article->titre) }}" required autocomplete="name" maxlength="150" autofocus>

							@error('titre')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                        </div>

                        <div class="form-group">
                            <label for="sous_titre">Indication pratique - ex: Le 24/11/2019 au Clapier</label>
							<input id="sous_titre" type="text" class="form-control @error('sous_titre') is-invalid @enderror" name="sous_titre" value="{{ old('sous_titre', $article->sous_titre) }}">

							@error('sous_titre')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                        </div>

                        <div class="form-group">
                            <label for="contenu" >Contenu article</label>
							<textarea class="form-control" id="contenu" name="contenu" rows="5" maxlength="5000">{{ old('contenu', $article->contenu) }}</textarea>
							
							@error('contenu')
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
									<label for="priorite">Priorité d'affichage</label>
									<input id="priorite" type="number" class="form-control @error('image') is-invalid @enderror" name="priorite" value="{{ old('priorite', $article->priorite) }}">

									@error('priorite')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
                        </div>

                        <div class="form-group">
							<div class="form-check">
								<input id="visible" name="visible" class="form-check-input" type="checkbox" @if(old('visible', $article->visible)==1) checked @endif id="defaultCheck1">
								<label for="visible" >Rendre l'article visible</label>
								
							</div>
							@error('visible')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Valider') }}
                                </button>
                                <a href="/article" class="btn btn-secondary">
                                    {{ __('Annuler') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
