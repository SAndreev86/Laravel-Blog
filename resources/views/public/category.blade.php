@extends('public.layouts.app')

@section('meta_title', $category->meta_title)

@section('content')
    <div class="col-md-8">
        @if($articles->count() > 0)
            <h1 class="my-4">
                <small>Статьи категории</small>
                {{$category->title}}
            </h1>
        @endif
        @forelse($articles as $article)
        <!-- Blog Post -->
            <div class="card mb-4">
                @if(!empty($article->image))
                    <img class="card-img-top" src="{{URL::to('/').UploadImage::load('article').$article->image}}"
                         alt="Card image cap">
                @endif
                <div class="card-body">
                    <h2 class="card-title">{{$article->title}}</h2>
                    <p class="card-text">{{$article->description_short}}</p>
                    <a href="{{route('article', $article->slug)}}" class="btn btn-primary">Читать &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Добавлено {{$article->updated_at}} by
                    <a href="{{route("user", $article->user->id)}}">{{ $article->user->name }}</a>
                </div>
            </div>
        @empty
            <h2 class="text-center">Пусто</h2>
        @endforelse
    </div>
    {{$articles->links()}}
@endsection