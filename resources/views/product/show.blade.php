@extends('main')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">제품</div>
    <form name="form1" method="post" action="">
        <div class="container mt-2">
            <table class="table table-sm table-bordered table-hover mymargin5">
                <thead>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">번호</td>
                        <td style="width: 80%;" align="left">{{ $row->id }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2" style="color: red">구분명</td>
                        <td style="width: 80%;" align="left">{{ $row->gubun_name }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2" style="color: red">제품명</td>
                        <td style="width: 80%;" align="left">{{ $row->name }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2" style="color: red">단가</td>
                        <td style="width: 80%;" align="left">{{ $row->price }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">재고</td>
                        <td style="width: 80%;" align="left">{{ $row->jaego }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">사진</td>
                        <td style="width: 80%;" align="left">
                            <b>파일이름</b> : {{ $row->pic }} <br>
                            @if ($row->pic)
                                <img src="{{ asset('storage/product_img/' . $row->pic) }}" width="200"
                                    class="img-fluid img-thumbnail mymargin5">
                            @else
                                <img src="" width="200" height="150" class="img-fluid img-thumbnail mymargin5">
                            @endif
                        </td>
                    </tr>
                </thead>
            </table>
            <div align="center">
                <a href="{{ route('product.edit', $row->id) }}" class="btn btn-sm mycolor1">수정</a>
                <form action="{{ route('product.destroy', $row->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" href="#" class="btn btn-sm mycolor1"
                        onclick="return confirm('삭제할까요?');">삭제</button>
                </form>
                <input type="submit" class="btn btn-sm mycolor1" value="저장">
                <input type="button" class="btn btn-sm mycolor1" value="이전화면" onclick="history.back();">
            </div>
    </form>
@endsection
