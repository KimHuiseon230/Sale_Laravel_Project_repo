@extends('main')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">BEST 제품</div>
    <script>
        function find_text() {
            form1.action = "{{ route('best.index') }}"
            form1.submit();
        }
        $(function() {
            $("#text1").datetimepicker({
                locale: "ko",
                format: "YYYY-MM-DD",
                defaultDate: moment()
            });

            $("#text2").datetimepicker({
                locale: "ko",
                format: "YYYY-MM-DD",
                defaultDate: moment()
            });
            $("#text1").on("dp.change", function(e) {
                find_text();
            });
            $("#text2").on("dp.change", function(e) {
                find_text();
            });

        });
    </script>
    <form name="form1" action="" method="get">
        <div class="d-inline-flex">
            <div class="input-group input-group-sm date" id="text1">
                <input class="form-control" size="10" type="text" name="text1" value="{{ $text1 }}"
                    onkeydown="if(event.keyCode == 13) {find_text();}">
                <span class="input-group-text">
                    <div class="input-group-addon">
                        <i class="far fa-calendar-alt fa-lg"></i>
                    </div>
                </span>
            </div>
        </div>
        -
        <div class="d-inline-flex">
            <div class="input-group input-group-sm date" id="text2">
                <input class="form-control" size="10" type="text" name="text2" value="{{ $text2 }}"
                    onkeydown="if(event.keyCode == 13) {find_text();}">
                <span class="input-group-text">
                    <div class="input-group-addon">
                        <i class="far fa-calendar-alt fa-lg"></i>
                    </div>
                </span>
            </div>
        </div>
        &nbsp;
    </form>
    <table class="table table-sm table-bordered table-hover mymargin5">
        <thead>
            <tr class="mycolor2">
                <td width="50%">제품명</td>
                <td width="50%">총 판매수량</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $row)
                <tr>
                    <td align="left">{{ $row->product_name }}</td>
                    <td align="right">{{ number_format($row->cnumo) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <div class="row">
        <div class="col">
            {{ $list->links('mypagination') }}
        </div>
    </div>
    </div>
@endsection
