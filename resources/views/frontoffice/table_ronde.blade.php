@extends('layouts.main')

@section('title', "Kaamelot'Tse")

@section('content')
    <div class="row carre text-center">
        <h2 class="m-0 p-2">
            La Table Ronde
        </h2>
    </div>
    <div class="row carre">
        @include('includes.quote')
    </div>
    <div class="row">
        <div ass="card-columns table_ronde">
            <div class="card carre">
                <img class="card-img-top perso" src="{{ Storage::url('images/membres/pere_blaise.jpg') }}"
                     alt="pere_blaise">
                <div class="card-body">
                    <h5 class="card-title">Père Blai'TSE</h5>
                </div>
            </div>
            <div class="card carre">
                <img class="card-img-top perso" src="{{ Storage::url('images/membres/perseval.jpg') }}" alt="Perceval">
                <div class="card-body">
                    <h5 class="card-title">Per'TSE'val</h5>
                </div>
            </div>
            <div class="card carre">
                <img class="card-img-top perso" src="{{ Storage::url('images/membres/lancelot.jpg') }}" alt="Lancelot">
                <div class="card-body">
                    <h5 class="card-title">Lancelot</h5>
                </div>
            </div>
            <div class="card carre">
                <img class="card-img-top perso" src="{{ Storage::url('images/membres/arthur.jpg') }}" alt="Arthur">
                <div class="card-body">
                    <h5 class="card-title">Arthur, roi des Brotsons</h5>
                </div>
            </div>
            <div class="card" style="background-color: transparent;">
                <img class="card-img-top" src="{{ Storage::url('images/table_ronde.png') }}" alt="Table_Ronde">
            </div>
            <div class="card carre">
                <img class="card-img-top perso" src="{{ Storage::url('images/membres/merlin.jpg') }}" alt="Merlin">
                <div class="card-body">
                    <h5 class="card-title">Merlin l'enchant'Tseur</h5>
                </div>
            </div>
            <div class="card carre">
                <img class="card-img-top perso" src="{{ Storage::url('images/membres/guenievre.jpg') }}"
                     alt="Guenievre">
                <div class="card-body">
                    <h5 class="card-title">Guenièvre de CarméliTSE</h5>
                </div>
            </div>
        </div>
    </div>
@endsection