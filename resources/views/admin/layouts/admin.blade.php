<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Панель администратора</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/blog-home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Блог backend разработчика</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.index')}}">Панель состояния</a>
                </li>

                <li class="nav-item dropdown">
                    <a  href="#" id="navbarDropdownBlog" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Блог <span class="caret"></span></a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog" >
                        <a class="dropdown-item" href="{{route('admin.category.index')}}">Категории</a>
                        <a class="dropdown-item" href="{{route('admin.articles.index')}}">Материалы</a>
                    </div>
                </li>

            </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarResponsive">


            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Вход</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Регистрация</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a  href="#" id="navbarDropdownLogout" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLogout" >
                            <a class="dropdown-item"  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выход</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>


        </div>
    </div>
</nav>


@yield('content')


<!-- Footer -->
<footer class="py-5 bg-dark footer navbar-fixed-bottom">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>


<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>

</html>