@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <h3 class="mb-2">
            Profil de  {{ $user->name }}
        </h3>

        <div class="d-flex flex-wrap">
            <div class="card m-3">
                <div class="card-body">
                    <h4></h4>
                </div>
            </div>
        </div>
    </div>
@endsection
