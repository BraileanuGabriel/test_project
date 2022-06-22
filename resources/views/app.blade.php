<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Cover Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="d-flex h-100 text-center text-white bg-dark" >

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" style="margin: 0 0 0 0; padding: 0 0 0 0">
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">Autogara</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('routes') }}" >Routes</a>
                <a class="nav-link" href="{{ route('passengers') }}">Passengers</a>
            </nav>
        </div>
    </header>
    @yield('content')

    <footer class="mt-auto text-white-50">
        <p>Project made by Braileanu Gabriel</p>
    </footer>
</div>



</body>
</html>

