@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-light p-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $message->subject }}</h3>
                    </div>
                    <div class="panel-body">
                        {!!  nl2br(e($message->content)) !!}
                    </div>
                    <div class="panel-footer">
                        {{ $message->created_at }}
                    </div>
                </div>

                <div class="my-3">
                    <p>
                        <a class="btn-primary btn" href="{{ route('message.respond', $message) }}">Répondre</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection