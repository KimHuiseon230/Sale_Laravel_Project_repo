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
            })
        })

        function select_product() {
            var str
            str = form1.sel_products_id.value;
            if (str == "") {
                form1.products_id.value = ""
                form1.price.value = ""
                form1.prices.value = ""
            } else {
                str = str.split("^^")
                form1.products_id.value = str[0]
                form1.price.value = str[1]
                form1.prices.value = Number(form1.price.value) * Number(form1.numo.value)
            }
        }

        function cal_prices() {
            form1.prices.value = Number(form1.price.value) * Number(form1.numo.value)
            form1.bigo.focus()
        }

        function find_product() {
            window.open("{{ route('findproduct.index') }}", "",
                "resizable=yes,scrollbars=yes,width=500,height=600");
        }
    </script>

    <form name="form1" method="post" action="{{ route('jangbuo.store') }}{{ $tmp }}" enctype="multipart/form-data">
        @csrf
        <div class="container mt-2">
            <table class="table table-sm table-bordered table-hover mymargin5">
                <thead>
                    <tr>
                        <td style="width: 20%;" class="mycolor2" style="color: red">날짜</td>
                        <td style="width: 80%;" align="left">
                            <div class="d-inline-flex">
                                <div class="input-group input-group-sm date" id="writeday">
                                    <input type="text" name="writeday" size="10" value="{{ old('writeday') }}"
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
                        <td style="width: 20%;" class="mycolor2" style="color: red">제품명</td>
                        <td style="width: 80%;" align="left">
                            <div class="d-inline-flex">
                                <input type="hidden" name="products_id" value="{{ old('products_id') }}">
                                <input type="text" name="products_name" size="20" value=""
                                    class="form-control form-control-sm" readonly>
                                <input type="button" value="제품찾기" class="btn btn-sm mycolor1" onclick="find_product();">
                                @error('products_id')
                                    {{ $message }}
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">단가</td>
                        <td style="width: 80%;" align="left">
                            <div class="d-inline-flex">
                                <input type="text" name="price" size="20"  value="{{ old('price') }}"
                                    onchange="cal_prices()" class="form-control form-control-sm">
                                @error('price')
                                    {{ $message }}
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">수량</td>
                        <td style="width: 80%;" align="left">
                            <div class="d-inline-flex">
                                <input type="text" name="numo" size="20" value=""
                                    onchange="cal_prices()" class="form-control form-control-sm">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">금액</td>
                        <td style="width: 80%;" align="left">
                            <div class="d-inline-flex">
                                <input type="text" name="prices" size="20" value=""
                                    class="form-control form-control-sm" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">비고</td>
                        <td style="width: 80%;" align="left">
                            <div class="d-inline-flex">
                                <input type="text" name="bigo" size="20" value="{{ old('bigo') }}"
                                    class="form-control form-control-sm">
                            </div>
                        </td>
                    </tr>
                </thead>
            </table>
            <div align="center">
                <input type="submit" class="btn btn-sm mycolor1" value="저장">
                <input type="button" class="btn btn-sm mycolor1" value="이전화면" onclick="history.back();">
            </div>
    </form>
@endsection
