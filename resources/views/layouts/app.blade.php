<!DOCTYPE html>
<html lang="{{App::currentLocale()}}" @if (App::isLocale('ar')) dir="rtl" @endif>
<!-- <html lang="en" dir="rtl"> -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/styles/sass/app.css">
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</body>
</html>