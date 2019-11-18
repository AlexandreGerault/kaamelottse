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
                            <label for="name">Nom</label>
							<input id="name"
                                   type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name"
                                   value="{{ old('name', $product->name) }}"
                                   autocomplete="name"
                                   maxlength="150" autofocus
                            />

							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                        </div>

                        <div class="form-group">
                            <label for="description" >Description</label>
							<textarea class="form-control"
                                      id="description"
                                      name="description"
                                      rows="5"
                                      maxlength="5000"
                                      required>
                                {{ old('description', $product->description) }}
                            </textarea>
							
							@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                        </div>
                            
                        <div class="row">
                            <div class="form-group col-md-9">
                                <label for="image">Url Image</label>
                                <input id="image"
                                       type="url"
                                       class="form-control @error('image') is-invalid @enderror"
                                       name="image"
                                       value="{{ old('image', $product->image) }}"
                                />
    
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                
                            <div class="form-group col-md-3">
                                <label>Stock</label>
                                <input type="text"
                                       class="form-control"
                                       value="{{ $product->stock }}" disabled
                                />
                            </div>
                        </div>                        
                            
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="price">Prix</label>
                                <input id="price"
                                       type="number"
                                       class="form-control @error('price') is-invalid @enderror"
                                       name="price"
                                       value="{{ old('price', $product->price) }}"
                                       min="0"
                                       step="0.1"
                                />
    
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group col-md-4">
                                <label for="nom">Points</label>
                                <input id="points"
                                       type="number"
                                       class="form-control @error('points') is-invalid @enderror"
                                       name="points"
                                       value="{{ old('points', $product->points) }}"
                                       min="0"
                                       max="5000"
                                />
    
                                @error('points')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group col-md-3">
                                <label for="priority">Priorité</label>
                                <input id="priority"
                                       type="number"
                                       class="form-control @error('priority') is-invalid @enderror"
                                       name="priority"
                                       value="{{ old('priority', $product->priority) }}"
                                       min="-5000" max="5000">
    
                                @error('priorite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
							<div class="form-check">
								<input id="available"
                                       name="available"
                                       class="form-check-input"
                                       type="checkbox" @if(old('available') || $product->available) checked @endif
                                       id="available">
								<label for="available" >Rendre le produit disponible à l'achat</label>
								
							</div>
							@error('available')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <a href="{{ route('product.index') }}" class="btn btn-secondary">
                                    {{ __('Retour') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Valider') }}
                                </button>
								@if(isset($product))
									<a class="btn btn-danger" href="{{ route('product.destroy', $product) }}" onclick="event.preventDefault();
															 document.getElementById('destroy-form').submit();">Supprimer</a>
								@endif
                            </div>
                        </div>
                    </form>
					@if(isset($product))
						<form id="destroy-form" action="{{ route('product.destroy', $product) }}" method="POST" style="display: none;">
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
