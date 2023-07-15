@extends('main')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">매입</div>
    <script>
        $(function() {
            $("#writeday").datetimepicker({
                locale: "ko",
                format: "YYYY-MM-DD",
                defaultDate: moment()
            });
        });

        function cal_prices() {
            form1.prices.value = Number(form1.price.value) * Number(form1.numo.value)
            form1.bigo.focus()
        }

        function find_product() {
            window.open("{{ route('findproduct.index') }}", "",
                "resizable=yes,scrollbars=yes,width=500,height=600");
        }
    </script>
    <form name="form1" method="post" action="{{ route('jangbuo.update', $row->id) }}"enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="container-fluid mt-2">
            <table class="table table-sm table-bordered table-hover mymargin5">
                <thead>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">번호</td>
                        <td style="width: 80%;" align="left">{{ $row->id }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">날짜</td>
                        <td style="width: 80%;" align="left">
                            <div class="d-inline-flex">
                                <div class="input-group input-group-sm date" id="writeday">
                                    <input type="text" name="writeday" size="10" value="{{ $row->writeday }}"
                                        class="form-control form-control-sm">
                                    <div class="input-group-text">
                                        <div class="input-group-addon">
                                            <i class="far fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('writeday')
                                {{ $message }}
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">제품명</td>
                        <td style="width: 80%;" align="left">
                            <div class="d-inline-flex">
                                <input type="hidden" name="products_id" value="{{ $row->products_id }}">
                                <input type="text" name="products_name" value="{{ $row->product_name }}"
                                    class="form-control form-control-sm" readonly>
                                <input type="button" value="제품찾기" class="btn btn-sm mycolor1" onclick="find_product();">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">단가</td>
                        <td style="width: 80%;" align="left">
                            <div class="d-inline-flex">
                                <input type="text" name="price" size="20" value="{{ $row->price }}" onchange="cal_prices()"
                                    class="form-control form-control-sm">
                            </div>
                            @error('price')
                                {{ $message }}
                            </td>
                        @enderror
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">수량</td>
                        <td style="width: 80%;" align="left">
                            <div class="d-inline-flex">
                                <input type="text" name="numo" value="" onchange="cal_prices()"
                                    class="form-control form-control-sm">
                            </div>
                            @error('numo')
                                {{ $message }}
                            </td>
                        @enderror
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">금액</td>
                        <td style="width: 80%;" align="left">
                            <input type="text" name="prices" size="20" value="{{ $row->prices }}"
                                class="form-control form-control-sm" readonly>
                            @error('prices')
                                {{ $message }}
                            </td>
                        @enderror
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">비고</td>
                        <td style="width: 80%;" align="left">
                            <input type="text" name="bigo" size="20" value="{{ $row->bigo }}"
                                class="form-control form-control-sm">
                            @error('bigo')
                                {{ $message }}
                            </td>
                        @enderror
                    </tr>
            </table>
            <div class="container" align="center">
                <a href="#" class="btn btn-sm mycolor1">수정</a>
                <a href="#" class="btn btn-sm mycolor1" onclick="return  confirm('삭제할까요?')">삭제</a>
                <input type="submit" class="btn btn-sm mycolor1" value="저장">
                <input type="button" class="btn btn-sm mycolor1" value="이전화면" onclick="history.back();">
    </form>
@endsection
