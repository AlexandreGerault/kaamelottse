@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Citations</div>

                    <div class="card-body">
                        <form method="POST" action="{{ $action }}">
                            @csrf
                            @if(isset($method))
                                @method($method)
                            @endif

                            <div class="form-group">
                                <label for="content">Contenu</label>
                                <textarea class="form-control"
                                          id="content"
                                          name="content"
                                          rows="5"
                                          maxlength="5000" required><!--
                                      -->{{ old('content', $quote->content) }}<!--
                            --></textarea>

                                @error('content')
                                <span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="author">Auteur(s)</label>
                                <input id="author" type="text"
                                       class="form-control @error('author') is-invalid @enderror" name="author"
                                       value="{{ old('author', $quote->author) }}"
                                       autocomplete="name" maxlength="150" autofocus/>

                                @error('author')
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
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                        Retour
                                    </a>
                                    @if(isset($quote))
                                        <a class="btn btn-danger" href="{{ route('quote.destroy', $quote) }}"
                                           onclick="event.preventDefault();
                                       document.getElementById('destroy-form').submit();">
                                            Supprimer
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        @if(isset($quote))
                            <form id="destroy-form" action="{{ route('quote.destroy', $quote) }}" method="POST"
                                  style="display: none;">
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
