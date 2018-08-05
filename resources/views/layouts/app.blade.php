<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ami Grid View | {{ $title ?? config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/grid-view/css/amigrid.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-info navbar-laravel">
        <div class="container">
            <a class="navbar-brand text-white">
                {{ config('app.name', 'Laravel AmiGridView') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/assurrussa/grid-view-table/tree/master/docs">Documentation</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ url()->current() === route('post.index') ? 'active' : '' }}"
                           href="{{ route('post.index') }}">Page 1 - Simple Paginate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ url()->current() === route('post.index2') ? 'active' : '' }}"
                           href="{{ route('post.index2') }}">Page 2 - Paginate</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<main class="py-0 pb-5">
    <div class="jumbotron">
        <div class="container" style="margin-top: 50px;">
            <h1>Laravel Ami Grid View Table</h1>
            <p>
                Simple, customizable, axios, vuejs, ready bootstrap styled mini grid view for the laravel framework. For laravel 5.6 and
                above.
            </p>
            <p>
                <a class="btn btn-info btn-lg" href="https://github.com/assurrussa/grid-view-table">
                    View on Github <i class="fa fa-github"></i>
                </a>
                <a class="btn btn-outline-info btn-lg float-right" href="https://github.com/assurrussa/grid-view-table-app">
                    View on Github DEMO APP <i class="fa fa-github"></i>
                </a>
            </p>
        </div>
    </div>
    @yield('content')

</main>

<div class="py-5"></div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('vendor/grid-view/js/amigrid.js') }}"></script>
@stack('scripts')
</body>
</html>
