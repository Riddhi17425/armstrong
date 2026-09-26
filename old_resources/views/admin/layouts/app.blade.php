<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Armstrong</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.includes.headerUrl')
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">
        @include('admin.includes.sidebar')
        <div class="main px-lg-4 px-md-4">
            @include('admin.includes.main-header')
            @yield('content')
        </div>
    </div>
    @include('admin.includes.footer')
</body>
</html>