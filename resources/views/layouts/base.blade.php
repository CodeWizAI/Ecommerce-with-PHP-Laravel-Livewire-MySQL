<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body class="home-page">
    <header id="header" class="header">
        @include('layouts.header')
        @include('layouts.navmenu')
    </header>

    {{ $slot }}

    <footer>
        @include('layouts.footer')
    </footer>
    @include('layouts.script')


</body>

</html>
