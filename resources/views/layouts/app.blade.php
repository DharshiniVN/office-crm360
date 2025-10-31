<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mobile-responsive.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <div class="layout">
        @include('partials.sidebar') <!-- Sidebar included only once -->

        <main class="content">
            @yield('content') <!-- Page-specific content -->
        </main>
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    @yield('scripts') <!-- Optional page-specific scripts -->
</body>
</html>
