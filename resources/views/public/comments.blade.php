@foreach($comments as $comment)

    <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0">{{$comment->user->name or 'Неведомое нечто'}}</h5>
            {{$comment->text}}
            <a href=".card-header" class="js-comment btn btn-link" data-id="{{$comment->id}}"
                 data-name="{{$comment->user->name or 'Неведомое нечто'}}"><i class="fas fa-reply"></i></a>
            @if($comment->children->count())
                @include('public.comments', [
                                    'comments' => $comment->children,
                                ])
            @endif
        </div>
    </div>

@endforeach