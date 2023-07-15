@extends('main')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">매출장</div>
    <script>
        function find_text() {
            form1.action = "{{ route('jangbuo.index') }}"
            form1.submit();
        }

        $(function() {
            $("#text1").datetimepicker({
                locale: "ko",
                format: "YYYY-MM-DD",
                defaultDate: moment()
            });

            $("#text1").on("dp.change", function(e) {
                find_text();
            });
        });
    </script>
    <form name="form1" action="" method="get">
        <div class="row">
            <div class="col-3" align="left">
                <div class="d-inline-flex">
                    <div class="input-group input-group-sm date" id="text1">
                        <span class="input-group-text">날짜</span>
                        <input class="form-control" size="10" type="date" name="text1" value="{{ $text1 }}"
                            onkeydown="if(event.keyCode == 13) {find_text();}">
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-9" align="right">
                <a href="{{ route('jangbuo.create') }}" class="btn btn-sm mycolor1">추가</a>
            </div>
        </div>
    </form>
    <table class="table table-sm table-bordered table-hover mymargin5">
        <thead>
            <tr class="mycolor2">
                <td>날짜</td>
                <td>제품명</td>
                <td>단가</td>
                <td>수량</td>
                <td>금액</td>
                <td>비고</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $row)
                <tr>
                    <td>{{ $row->writeday }}</td>
                    <td>
                        <a href="{{ route('jangbuo.show', $row->id) }}{{ $tmp }}">{{ $row->product_name }}</a>
                    </td>
                    <td align="right">{{ number_format($row->price) }}</td>
                    <td align="right">{{ number_format($row->numo) }}</td>
                    <td align="right">{{ number_format($row->prices) }}</td>
                    <td align="right">{{ $row->bigo }}</td>
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
