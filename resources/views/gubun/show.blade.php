@extends('main')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">구분</div>
    <form name="form1" method="post" action="">
        <div class="container-fluid mt-2">
            <table class="table table-sm table-bordered table-hover mymargin5">
                <thead>
                    <tr>
                        <td style="width: ;" class="mycolor2">번호</td>
                        <td style="width: ; "class="mycolor2">이름</td>
                    </tr>
                    <tr>
                        <td style="width: ;">{{ $row->id }}</td>
                        <td style="width: ;">
                            {{ $row->name }}
                        </td>
                    </tr>
                </thead>
            </table>
            <div align="center">
                <a href="{{ route('gubun.edit', $row->id) }}" class="btn btn-sm mycolor1">수정</a>
                <form action="{{ route('gubun.destroy', $row->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm mycolor1" onclick="return confirm('삭제할까요 ?');">삭제</button>
                    &nbsp;
                </form>
                <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
            </div>
        </div>
    </form>
@endsection
