@extends('admin.layouts.admin')

@section('content')
    <!-- Page Content -->
    <div class="container">
        @component('admin.components.breadcrumb');
        @slot('title') Список новостей @endslot
        @slot('parent') Главная @endslot
        @slot('active') Новости @endslot
        @endcomponent

        <a href="{{route('admin.articles.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"></i> Создать новость
        </a>
        <table class="table table-striped">
            <thead>
            <th>Наименование</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse($articles as $article)
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->published}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true } else{ return false }" action="{{route('admin.articles.destroy',
                        $article)}}" method="post">

                            <input type="hidden" name="_method" value="DELETE">

                            {{ csrf_field() }}

                            <a class="btn btn-default" href="{{route('admin.articles.edit', $article)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" class="btn"><i class="fas fa-times-circle"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">
                        <h2>Данные отсутствуют</h2>
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$articles->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

    <!-- /.container -->
@endsection
