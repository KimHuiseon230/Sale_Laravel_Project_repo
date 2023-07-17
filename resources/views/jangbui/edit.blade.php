@extends('main')
{{-- 내용 --}}
@section('content')
    <br>
    <div class="alert mycolor1" role="alert">제품</div>

    <script>
        $(function() {
            $("#writeday").datetimepicker({
                locale: "ko",
                format: "YYYY-MM-DD",
                defaultDate: moment()
            })
        })

        function cal_prices() {
            form1.prices.value = Number(form1.price.value) * Number(form1.numo.value)
        }
    </script>
    <form name="form1" action="{{ route('jangbui.update', $row->id) }}{{ $tmp }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <table class="table table-bordered table-sm mymargin5">
            <tr>
                <td width="20%" class="mycolor2">번호</td>
                <td width="80%" align="left">{{ $row->id }}</td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">
                    <font color="red">*</font> 날짜
                </td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <div class="input-group input-group-sm date" id="writeday">
                            <input type="text" name="writeday" size="10" value="{{ $row->writeday }}"
                                class="form-control form-control-sm">
                            <div class="input-group-text">
                                <div class="input-group-addon">
                                    <i class="far fa-calendar-alt fa-lg"></i>
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
                <td width="20%" class="mycolor2">
                    <font color="red">*</font> 제품명
                </td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <select name="products_id" class="form-select form-control-sm">
                            <option value="">선택하세요.</option>
                            @foreach ($list as $row1)
                                @if ($row1->id == $row->products_id)
                                    <option value="{{ $row1->id }}" selected>{{ $row1->name }}</option>
                                @else
                                    <option value="{{ $row1->id }}">{{ $row1->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @error('products_id')
                        {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">단가</td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <input type="text" name="price" size="20" value="{{ $row->price }}"
                            class="form-control form-control-sm" onchange="cal_prices()" />
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">수량</td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <input type="text" name="numi" size="20" value="{{ $row->numi }}"
                            class="form-control form-control-sm" onchange="cal_prices()" />
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">금액</td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <input type="text" name="prices" size="20" value="{{ $row->prices }}"
                            class="form-control form-control-sm" readonly />
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">비고</td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <input type="text" name="bigo" size="20" value="{{ $row->bigo }}"
                            class="form-control form-control-sm" />
                    </div>
                </td>
            </tr>
        </table>
        <div align="center">
            <input type="submit" value="저장" class="btn btn-sm mycolor1" />&nbsp;
            <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();" />
        </div>
    </form>
@endsection
