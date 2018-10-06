<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('head')
</head>

<body class="hold-transition sidebar-mini bg-dark">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-dark border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3" method="POST" action="{{ url('search') }}">
            @csrf
            <div class="input-group">
                <input class="form-control form-control-navbar" style="border-radius: 15px;" type="search" name="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search text-white"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        {{--<ul class="navbar-nav ml-auto">--}}
        {{--<!-- Messages Dropdown Menu -->--}}
        {{--<li class="nav-item d-none d-sm-inline-block">--}}
        {{--<a href="{{ url('/contact') }}" class="nav-link">Contact</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item d-none d-sm-inline-block">--}}
        {{--<a href="{{ url('/privacy') }}" class="nav-link">Privacy Policy</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item d-none d-sm-inline-block">--}}
        {{--<a href="{{ url('/DMCA') }}" class="nav-link">Dmca</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="{{ asset('images/logo.png')}}" alt="Filma24" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Filma24</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="{{ route('movies.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-th green"></i>
                            <p class="teal">
                                <strong class="text-warning">
                                    All Movies
                                </strong>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('series.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-th green"></i>
                            <p class="teal">
                                <strong class="text-warning">
                                    All Series
                                </strong>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                Genres
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav-treeview">
                            @foreach(\App\Model\Genre::all() as $genre)
                                <li class="nav-item">
                                    <a href="{{ route('showGenreBySlug', $genre->slug) }}" class="nav-link">
                                        <i class="nav-icon fas fa-circle text-warning"></i>
                                        <p class="teal">
                                            {{ $genre->name }}
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-secondary">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer bg-dark text-white">
        <!-- Default to the left -->
        <strong>Copyright &copy; 2018 <a href="https://www.filma24.stream">Filma24.stream</a>.</strong> All rights reserved.
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <a href="{{ url('/contact') }}" class="nav-link">Contact</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/privacy') }}" class="nav-link">Privacy Policy</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/DMCA') }}" class="nav-link">Dmca</a>
            </li>
        </ul>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- AdminLTE App -->
<script src="{{ asset('js/app.js')}}"></script>
@yield('scripts')
</body>

</html>