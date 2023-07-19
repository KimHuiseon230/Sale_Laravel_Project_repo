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

    <script src="{{ asset('my/js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('my/js/bootstrap5-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('my/js/bootstrap5-datetimepicker.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('my/css/bootstrap5-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('my/css/all.min.css') }}">
</head>

<body>
    @include('inc.nav')
    {{-- 본문부분 --}}
    {{-- 캐러셀 시작 --}}
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('my/img/main1.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('my/img/main2.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('my/img/main3.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    {{-- 캐러셀 끝 --}}
    @yield('content')
    {{-- 푸터부분 --}}
    {{-- @include('inc.footer') --}}
    {{-- 자바스크립트 추가, js --}}
    @yield('before_body_end_tag')
</body>
{{-- 로그인 창  --}}
<div>
    <div class="modal fade" id="exampleModal" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header mycolor1">
                    <h5 class="modal-title" id="exampleModalLabel">로그인</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <form name="form_login" method="post" action="{{ url('login/check') }}">
                        @csrf
                        @method('post')
                        <table class="table table-sm table-bordered table-hover mymargin5">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">아이디</label>
                                <input type="text" name="uid" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">비밀번호</label>
                                <input type="password" name="pwd" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary"
                        onclick="javascript:form_login.submit();">확인</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">닫기</button>
                </div>
            </div>
        </div>
    </div>
    {{-- 로그인창 끝 --}}

</div>

</html>
