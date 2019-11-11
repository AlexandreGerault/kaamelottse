@extends('layouts.main')

@section('title', "Kaamelot'Tse")

@section('content')
    <div class="row carre">
        <h2 class="m-0 p-2">
          Formulaire de Contact
        </h2>
    </div>
    <div class="row carre">
        @include('layouts.citation')
    </div>
    <div class="row carre p-4">
        <form method="post" action="" style="width: 100%">
          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Votre demande concerne:</label>
            <div class="col-sm-8">
                <select class="form-control" id="FormCategorie">
                    <option>Une demande d'information sur un évènement</option>
                    <option>Une demande concernant une commande / un service</option>
                    <option>Les paroles de Martins Marteau</option>
                    <option>Un problème technique avec le site</option>
                    <option>Une demande de confidencialité</option>
                </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Email">
              <small id="emailHelp" class="form-text text-muted">Inscrivez votre adresse email pour que l'on vous recontacte.</small>
            </div>           
          </div>
          <div class="form-group row">
            <label for="inputSujet" class="col-sm-3 col-form-label">Sujet</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="inputSubject" aria-describedby="emailHelp" placeholder="Sujet">
            </div>
          </div>
          <div class="form-group row">
            <label for="formMessage" class="col-sm-3 col-form-label">Description de la demande</label>
            <div class="col-sm-8">
              <textarea class="form-control" id="formMessage" rows="3"></textarea>
              <button type="submit" class="btn btn-dark mt-4">Envoyer la demande</button>
            </div>
          </div>
        </form>
    </div>
@endsection