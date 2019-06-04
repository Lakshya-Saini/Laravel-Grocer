<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.header')
</head>
<body>
    <div id="app">
        @include('partials.navbar')

        <div class="container-fluid">
            @include('partials.messages')
            @yield('content')
        </div>
    </div>

    @include('partials.scripts')
</body>
</html>
