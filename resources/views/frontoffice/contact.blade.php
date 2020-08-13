@extends('layouts.main')

@section('title', "Kaamelot'Tse")

@section('content')
    <div class="row carre">
        <h2 class="m-0 p-2">
            Formulaire de Contact
        </h2>
    </div>
    <div class="row carre">
        @include('includes.quote')
    </div>
    <div class="row carre p-4">
        <form method="post" action="{{ route('message.store') }}" style="width: 100%">
            @csrf
            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Votre demande concerne:</label>
                <div class="col-sm-8">
                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                        @foreach ($categories_messages as $categorieId => $categorieNom)
                            <option value="{{ $categorieId }}" @if($categorieId==old('category')) selected @endif >{{
                                $categorieNom }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           id="email" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <small id="email" class="form-text text-muted">Inscrivez votre adresse email pour que l'on vous
                        réponde.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSujet" class="col-sm-3 col-form-label">Sujet</label>
                <div class="col-sm-8">
                    <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                           id="subject" placeholder="Sujet" value="{{ old('subject') }}">
                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-3 col-form-label">Description de la demande</label>
                <div class="col-sm-8">
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3"
                              name="content">{{ old('content') }}</textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button type="submit" class="btn btn-dark mt-4">Envoyer la demande</button>
                </div>
            </div>
        </form>
    </div>
@endsection