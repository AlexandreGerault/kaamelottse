@extends('layouts.backoffice')

@section('title', "Kaamelot'Tse")

@section('content')
    <div class="container">
        <h3 class="mb-5">Répondre à une prise de contact</h3>
        @if($message->responded)
            <p class="mb-3">Ce message a déjà reçu une réponse</p>
        @endif
        <form method="post" action="{{ route('backoffice.message.respond', $message) }}" style="width: 100%">
            @csrf
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email"
                           name="email"
                           class="form-control-plaintext @error('email') is-invalid @enderror"
                           disabled
                           id="email" aria-describedby="emailHelp"
                           placeholder="Email"
                           value="{{ $message->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSujet" class="col-sm-3 col-form-label">Sujet</label>
                <div class="col-sm-8">
                    <input type="text" name="subject"
                           class="form-control-plaintext @error('subject') is-invalid @enderror" id="subject"
                           disabled
                           placeholder="Sujet" value="{{ $message->subject }}">
                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-3 col-form-label">Demande</label>
                <div class="col-sm-8">
                    <p class="form-control-plaintext @error('content') is-invalid @enderror" id="content"
                       name="content">
                        {!!  nl2br(e($message->content)) !!}
                    </p>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ old('content') }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSujbect" class="col-sm-3 col-form-label">Sujet de réponse</label>
                <div class="col-sm-8">
                    <input type="text"
                           name="answerSubject"
                           class="form-control @error('answerSubject') is-invalid @enderror"
                           id="inputSujbect"
                           placeholder="Sujet de réponse"
                           value="{{ old('answerSubject') }}"
                    />
                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="answerContent" class="col-sm-3 col-form-label">Réponse à la demande</label>
                <div class="col-sm-8">
                    <textarea class="form-control @error('answerContent') is-invalid @enderror" id="answerContent"
                              rows="3" name="answerContent">{{ old('answerContent') }}</textarea>
                    @error('answerContent')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ old('answerContent') }}</strong>
                    </span>
                    @enderror
                    <button type="submit" class="btn btn-dark mt-4">Envoyer la réponse</button>
                </div>
            </div>
        </form>
    </div>
@endsection
