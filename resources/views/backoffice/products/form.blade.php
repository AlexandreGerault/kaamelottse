@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <h3 class="mb-5">Produit</h3>
        <div>
            <form method="POST" action="{{ $action }}">
                @csrf
                @if(isset($method)) @method($method) @endif

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name', $product->name) }}" required
                           maxlength="150" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea id="content" class="form-control" id="description" name="description" rows="5"
                              maxlength="5000">{{ old('description', $product->description) }}</textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-8">
                            <label for="image">Lien Image associée (optionnel)</label>
                            <input id="image" type="url"
                                   class="form-control @error('image') is-invalid @enderror" name="image"
                                   value="{{ old('image',$product->image) }}">

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="priority">Priorité d'affichage</label>
                            <input id="priority" type="number"
                                   class="form-control @error('priority') is-invalid @enderror"
                                   name="priority" value="{{ old('priority', $product->priority) }}">

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
                        <div class="col-4">
                            <label for="price">Prix produit</label>
                            <input id="price" type="number"
                                   class="form-control @error('price') is-invalid @enderror" name="price"
                                   value="{{ old('price', $product->price) }}" step="0.01">

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="points">Points obtenus</label>
                            <input id="link" type="number"
                                   class="form-control @error('points') is-invalid @enderror" name="points"
                                   value="{{ old('points', $product->points) }}">

                            @error('points')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="stock">Stock</label>
                            <input id="stock" type="number"
                                   class="form-control @error('stock') is-invalid @enderror" name="stock"
                                   value="{{ old('stock', $product->stock) }}">

                            @error('stock')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input id="available" name="available" class="form-check-input" type="checkbox"
                               @if(old('published', $product->available)) checked @endif>
                        <label for="available">Rendre le produit disponible à l'achat</label>

                    </div>
                    @error('available')
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
                        <a href="{{ route('backoffice.product.index') }}" class="btn btn-secondary">
                            {{ __('Annuler') }}
                        </a>
                        @if($product->id !== null)
                        <a class="btn btn-danger" href="{{ route('backoffice.product.destroy', $product) }}"
                           onclick="event.preventDefault();
                                         document.getElementById('destroy-form').submit();">Supprimer</a>
                        @endif
                    </div>
                </div>
            </form>
            @if($product->id !== null)
            <form id="destroy-form" action="{{ route('backoffice.product.destroy', $product) }}" method="POST">
                @method('DELETE')
                @csrf
            </form>
            @endif
        </div>
    </div>
@endsection
