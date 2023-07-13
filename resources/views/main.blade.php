<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>판매관리</title>
    <link rel="stylesheet" href="{{ asset('my/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('my/css/my.css') }}">
    <script src="{{ asset('my/js/jquery.js') }}"></script>
    <script src="{{ asset('my/js/popper.js') }}"></script>
    <script src="{{ asset('my/js/bootstrap.min.js') }}"></script>

</head>

<body>
    @include('inc.nav')
    {{-- 본문부분 --}}
    @yield('content')
    {{-- 푸터부분 --}}
    {{-- @include('inc.footer') --}}
    {{-- 자바스크립트 추가, js --}}
    @yield('before_body_end_tag')
</body>

</html>
