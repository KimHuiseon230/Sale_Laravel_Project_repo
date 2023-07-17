@extends('main')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">제품</div>
    <form name="form1" method="post" action="">
        <div class="container mt-2">
            <table class="table table-sm table-bordered table-hover mymargin5">
                <thead>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">날짜</td>
                        <td style="width: 80%;" align="left">{{ $row->writeday }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2" style="color: red">제품명</td>
                        <td style="width: 80%;" align="left">{{ $row->product_name }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2" style="color: red">단가</td>
                        <td style="width: 80%;" align="left">{{ $row->price }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">수량</td>
                        <td style="width: 80%;" align="left">{{ $row->numi }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">금액</td>
                        <td style="width: 80%;" align="left">{{ $row->prices }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">비고</td>
                        <td style="width: 80%;" align="left">{{ $row->bigo }}</td>
                    </tr>
                </thead>
            </table>
            <div align="center">
                <a href="{{ route('jangbui.edit', $row->id) }}" class="btn btn-sm mycolor1">수정</a>
                <form action="{{ route('jangbui.destroy', $row->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm mycolor1" onclick="return confirm('삭제할까요 ?');">삭제</button>
                    &nbsp;
                </form>
                <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
            </div>
    </form>
@endsection
