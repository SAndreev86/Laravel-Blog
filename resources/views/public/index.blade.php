@extends('public.layouts.app')

@section('meta_title', 'Главная')

@section('content')
    <div class="col-md-8">
    @forelse($articles as $article)
        <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$article->title}}</h2>
                    <p class="card-text">{{$article->description_short}}</p>
                    <a href="{{route('article', $article->slug)}}" class="btn btn-primary">Читать &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Добавлено {{$article->updated_at}} by
                    <a href="{{route("user", Auth::id())}}">{{ Auth::user()->name }}</a>
                </div>
            </div>
        @empty
            <h2 class="text-center">Пусто</h2>
        @endforelse
    </div>
    {{$articles->links()}}
@endsection