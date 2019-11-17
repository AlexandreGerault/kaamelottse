@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produit</div>

                <div class="card-body">
                    <form method="POST" action="{{ $action }}">
                        @csrf
						@if(isset($method))
							@method($method)
						@endif

                        <div class="form-group">
                            <label for="nom">Nom</label>
							<input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom', $produit->nom) }}" autocomplete="name" maxlength="150" autofocus>

							@error('auteur')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                        </div>

                        <div class="form-group">
                            <label for="description" >Description</label>
							<textarea class="form-control" id="description" name="description" rows="5" maxlength="5000" required>{{ old('description', $produit->description) }}</textarea>
							
							@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                        </div>
                            
                        <div class="row">
                            <div class="form-group col-md-9">
                                <label for="image">Url Image</label>
                                <input id="image" type="url" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image', $produit->image) }}">
    
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                
                            <div class="form-group col-md-3">
                                <label>Stock</label>
                                <input type="text" class="form-control" value="{{ $produit->stock }}" disabled>
                            </div>
                        </div>                        
                            
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="nom">Prix</label>
                                <input id="prix" type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix', $produit->prix) }}" min="0" step="0.01">
    
                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group col-md-4">
                                <label for="nom">Points</label>
                                <input id="points" type="text" class="form-control @error('points') is-invalid @enderror" name="points" value="{{ old('points', $produit->points) }}" min="0" max="5000">
    
                                @error('points')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group col-md-3">
                                <label for="nom">Priorité</label>
                                <input id="priorite" type="text" class="form-control @error('priorite') is-invalid @enderror" name="priorite" value="{{ old('priorite', $produit->priorite) }}" min="-5000" max="5000">
    
                                @error('priorite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Valider') }}
                                </button>
                                <a href="/produit" class="btn btn-secondary">
                                    {{ __('Annuler') }}
                                </a>
								@if(isset($id))
									<a class="btn btn-danger" href="{{ route('produit.destroy',$id) }}" onclick="event.preventDefault();
															 document.getElementById('destroy-form').submit();">Supprimer</a>
								@endif
                            </div>
                        </div>
                    </form>
					@if(isset($id))
						<form id="destroy-form" action="{{ route('produit.destroy', $id) }}" method="POST" style="display: none;">
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
