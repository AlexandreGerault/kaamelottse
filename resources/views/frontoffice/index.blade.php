@extends('layouts.main')

@section('title', "Kaamelot'Tse")

@section('content')
    <div class="row carre carousel slide" id="diaporama">
        <div class="carousel-inner">
            <div class="carousel-item active">
		<img src="images/diapo1.jpg" alt="diapo1" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="{{ Storage::url('images/diapo3.jpg') }}" alt="diapo1" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="{{ Storage::url('images/diapo2.jpg') }}" alt="diapo1" class="d-block w-100">
            </div>
        </div>
    </div>
    <div class="row carre">
        @include('includes.quote')
    </div>
    <div class="row">
        <div class="card-columns">
            @foreach ($articles as $article)
                <div class="card carre">
                    @if ($article->image)
                        <img src="{{ $article->image }}" class="card-img-top" alt="logo">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{!! nl2br(e($article->content)) !!}</p>
                    </div>
                    @if ($article->slug)
                        <div class="card-body">
                            <a href="{{ $article->link }}" class="card-link">{{ $article->slug }}</a>
                        </div>
                    @endif
                </div>
            @endforeach
            {{ $articles->links() }}
        </div>
    </div>
@endsection
