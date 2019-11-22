@extends('layouts.main')

@section('title', "Kaamelot'Tse")

@section('content')
    <div class="row carre">
        <h2 class="m-0 p-2">
            Nouvelle commande
        </h2>
    </div>
    <div class="row carre">
        @include('includes.quote')
    </div>
    <div class="row carre p-4">
        <form method="post" action="" style="width: 100%">
            <div class="row">
                <div class="col">
                    <input type="number" class="form-control" id="cookies" aria-describedby="cookies" value="0" min=0>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSujet" class="col-sm-3 col-form-label">Livraison</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputSubject" aria-describedby="emailHelp" placeholder="adresse">
                    <small id="emailHelp" class="form-text text-muted">Précisez l'adresse de livraison dans St Etienne</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSujet" class="col-sm-3 col-form-label">Comment vous contacter</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputSubject" aria-describedby="emailHelp" placeholder="téléphone / messager">
                    <small id="emailHelp" class="form-text text-muted">Précisez un moyen de vous contacter en cas de besoin</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="formMessage" class="col-sm-3 col-form-label">Informations coplémentaires</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="formMessage" rows="2"></textarea>
                    <small id="emailHelp" class="form-text text-muted">Informations de livraison complémentaire, </small>
                    <button type="submit" class="btn btn-dark mt-4">Commander</button>
                </div>
            </div>
        </form>
    </div>
@endsection