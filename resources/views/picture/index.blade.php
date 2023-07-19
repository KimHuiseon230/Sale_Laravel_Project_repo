@php
    use Intervention\Image\Facades\Image;
@endphp
<link rel="stylesheet" href="{{ asset('my/css/my.css') }}">
<style>
    /* 내부 스타일을 정의합니다. */
    .mythumb_box {
        font-size: 14px;
        text-align: center;
        border: 1px solid lightgray;
        padding: 3px;
        margin: 5px 0px 5px 0px
    }

    .mythumb_imge {
        height: 150px;
        max-width: 100%;
        margin-bottom: 3px
    }

    .mythumb_text {
        border: 1px solid lightgray;
        background-color: lightsteelblue;
        padding: 3px;
    }
</style>
@extends('main')
@section('content')
    <br>
    <div class="alert mycolor1" role="alert">제품사진</div>
    <script>
        function find_text() {
            form1.action = "{{ route('picture.index') }}";
            form1.submit();
        }

        function SendProduct(id, name, price) {
            opener.form1.products_id.value = id
            opener.form1.products_name.value = name
            opener.form1.price.value = price
            opener.form1.prices.value = Number(price) * Number(opener.form1.numo.value)
        }
    </script>
    <form name="form1" action="" method="get">
        <div class="row">
            <div class="col-6" align="left">
                <div class="input-group input-group-sm">
                    <span class="input-group-text">이름</span>
                    <input class="form-control" type="text" name="text1" value="{{ $text1 }}"
                        onkeydown="if(event.keyCode == 13) {find_text();}">
                    <button class="btn mycolor1 ms-1" type="button" onclick="find_text()">검색</button>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <!-- 이미지들 출력 -->
        @foreach ($list as $row)
            <?php
            $iname = $row->pic ? $row->pic : '';
            $pname = $row->name;
            ?>
            <div class="col-3">
                <div class="mythumb_box">
                    <!-- onclick 이벤트 핸들러 수정 -->
                    <a href="javascript:zoomimage('{{ $iname }}', '{{ $pname }}')">
                        <img src="{{ asset('/storage/product_img/' . $iname) }}" class="mythumb_image"
                            style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#zoomModal"
                            onclick="updateModalContent('{{ $pname }}', '{{ asset('/storage/product_img/thumb' . $iname) }}')">
                    </a>
                    <div class="mythumb_text">{{ $pname }}</div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
<!-- 모달 코드 -->
<div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="zoomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zoomModalLabel">상품명1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" align="center">
                <img src="" id="picname" class="img-fluid img-thumbnail" style="cursor: pointer"
                    data-bs-dismiss="modal" alt="">
            </div>
        </div>
    </div>
</div>
<!-- JavaScript 코드 -->
<script>
    function updateModalContent(productName, imageUrl) {
        // 모달의 제목과 이미지 소스 업데이트
        document.getElementById('zoomModalLabel').innerText = productName;
        document.getElementById('picname').src = imageUrl;
    }
</script>
