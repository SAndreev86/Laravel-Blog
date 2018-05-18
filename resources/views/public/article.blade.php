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

    @if(!empty($article->image))
        <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{URL::to('/').UploadImage::load('article').$article->image}}" alt="">
            <hr>
    @endif
    <!-- Post Content -->
        {!! $article->description !!}

        <hr>
        <!-- Categories -->
        @foreach($categories as $category)
            <a href="{{route("category", $category->slug)}}">{{$category->title}}</a>
        @endforeach
        <hr>

        <!-- Comments Form -->
        @include('public.partials.form', [
            'article' => $article
        ])


    <!-- Single Comment -->
        @if(!empty($comments))

            @include('public.comments', [
                'comments' => $comments
            ])

        @else
            <h2 class="text-center">Комментариев нет</h2>
        @endif
    </div>
@endsection