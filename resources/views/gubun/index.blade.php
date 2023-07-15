@extends('main')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">구분</div>
    <script>
        function find_text() {
            form1.action = "{{ route('gubun.index') }}"
            form1.submit();
        }
    </script>
    <form name="form1" action="" method="get">
        <div class="row">
            <div class="col-3" align="left">
                <div class="input-group input-group-sm">
                    <span class="input-group-text">이름</span>
                    <input class="form-control" type="text" name="text1" value=""
                        onkeydown="if(event.keyCode == 13) {find_text();}">
                    <button class="btn mycolor1 ms-1" type="button" onclick="find_text()">검색</button>
                </div>
            </div>
            <div class="col-9" align="right">
                <a href="{{ route('gubun.create') }}{{ $tmp }}" class="btn btn-sm mycolor1">추가</a>
            </div>
        </div>
    </form>
    <table class="table table-sm table-bordered table-hover mymargin5">
        <thead>
            <tr  class="mycolor2">
                <th scope="col">번호</th>
                <th cope="col">구분명</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>
                        <a href="{{ route('gubun.show', $row->id) }}{{ $tmp }}">{{ $row->name }}</a>
                    </td>
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
