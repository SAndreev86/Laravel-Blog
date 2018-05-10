<div class="card my-4">
    <h5 class="card-header">Последние комментарии:</h5>
    <div class="card-body">
        <form action="{{route('comment.store')}}" method="post">

            {{ csrf_field() }}

            <input type="hidden" name="article" value="{{$article->id}}">
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <input type="hidden" name="parent_id" value="0">

            <div class="form-group">
                <textarea class="form-control" name="text" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
