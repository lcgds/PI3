<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    @yield('title')
    @include('layouts.links')
    @yield('css')
</head>

<body>

    @include('layouts.header_user')

    @yield('content')

    @include('layouts.footer')

</body>

</html>
