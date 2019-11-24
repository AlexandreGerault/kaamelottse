@extends('layouts.backoffice')

@section('content')
    <div class="container">
        <h3 class="mb-5">Voir une demande de contact</h3>

        @if($message->responded)
            <p class="mb-3">Ce message a déjà reçu une réponse</p>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="p-0 m-0">{{ $message->subject }}</h5>
            </div>
            <div class="card-body">
                {!!  nl2br(e($message->content)) !!}
            </div>
            <div class="card-footer">
                {{ $message->created_at->formatLocalized('%A %d %B %Y à %Hh%m') }}
            </div>
        </div>

        <div class="my-3">
            <p>
                <a class="btn-primary btn" href="{{ route('backoffice.message.respond', $message) }}">
                    Répondre
                </a>
            </p>
        </div>
    </div>
@endsection
