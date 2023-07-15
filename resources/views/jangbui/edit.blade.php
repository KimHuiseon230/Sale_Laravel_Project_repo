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
        public find_product() {
            window.open("{{ route('findproduct.index') }}", "",
                "resizable=yes,scrollbars=yes,width=500,height=600");
        }

    </script>
    <form name="form1" method="post" action="{{ route('jangbui.update', $row->id) }}"enctype="multipart/form-data">
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
                            <select name="products_id" id="">
                                <option value="" selected>선택하세요</option>
                                @foreach ($list as $row1)
                                    @if ($row1->id == $row->products_id)
                                        <option value="{{ $row1->id }}" selected>{{ $row1->name }}</option>
                                    @else
                                        <option value="{{ $row1->id }}">{{ $row1->name }}</option>
                                    @endif
                                @endforeach
                                @error('products_id')
                                    {{ $message }}
                                @enderror
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">단가</td>
                        <td style="width: 80%;" align="left">
                            <input type="text" name="price" size="20" value="{{ $row->price }}"
                                class="form-control form-control-sm">
                            @error('price')
                                {{ $message }}
                            </td>
                        @enderror
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">수량</td>
                        <td style="width: 80%;" align="left">
                            <input type="text" name="numi" size="20" value="{{ $row->numi }}"
                                class="form-control form-control-sm">
                            @error('numi')
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
