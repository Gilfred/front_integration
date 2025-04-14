<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>@yield('title','Gestionnaire')</title>
</head>
<body>
    <header>
        @include('partials.header')
    </header>

    <main>
        @include('components.banner')

        @include('components.section1')

        @include('components.section2')

        @include('components.tableau')
    </main>

    <footer>
        @include('partials.footer')
    </footer>
</body>
</html>
