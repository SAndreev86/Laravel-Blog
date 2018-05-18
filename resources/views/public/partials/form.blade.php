<div class="card my-4">
    <h5 class="card-header">Последние комментарии:</h5>
    <div class="card-body">
        <form action="{{route('comment.store')}}" method="post">

            {{ csrf_field() }}

            <div id="js-comment-add">
                <input type="hidden" name="parent_id" value="0">
            </div>

            <input type="hidden" name="article" value="{{$article->id}}">
            <input type="hidden" name="user_id" value="{{Auth::id() or ''}}">

            <div class="form-group">
                <textarea class="form-control" name="text" rows="3" id="comment-text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</div>
