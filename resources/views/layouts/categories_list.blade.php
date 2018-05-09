@foreach($categories as $category)
    <li>
        <a href="{{url("/blog/category/$category->slug")}}">{{$delimiter.$category->title}}</a>
    </li>
    @if($category->children->where('published', 1)->count())
        @include('layouts.categories_list', [
                            'categories' => $category->children,
                            'delimiter' => $delimiter.' - '
                        ])
    @endif
@endforeach