@extends('public.layouts.app')

@section('meta_title', $article->meta_title)
@section('meta_description', $article->meta_description)
@section('meta_keywords', $article->meta_keywords)

@section('content')

<!-- Post Content Column -->
<div class="col-lg-8">

    <!-- Title -->
    <h1 class="mt-4">{{$article->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by
        <a href="{{route("user", $article->user->id)}}">{{ $article->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Добавлено {{$article->updated_at}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

    <hr>

    <!-- Post Content -->
    {!! $article->description !!}

    <hr>

    <!-- Comments Form -->
    @include('public.partials.form', [
        'article' => $article
    ])
    <!-- Single Comment -->
    @forelse($comments as $comment)

    <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0">{{$comment->user->name}}</h5>
            {{$comment->text}}
        </div>
    </div>
    @empty
        <h2 class="text-center">Комментариев нет</h2>
    @endforelse
</div>
@endsection