@extends('main')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">구분</div>
    <form name="form1" method="post" action="{{ route('gubun.update', $row->id) }}{{ $tmp }}">
        @csrf
        @method('PATCH')
        <div class="container-fluid mt-2">
            <table class="table table-sm table-bordered table-hover mymargin5">
                <thead>
                    <tr class="mycolor2">
                        <th style="width:">번호</th>
                        <th style="width:;">구분명</th>
                    </tr>
                    <tr>
                        <td style="width: ;">{{ $row->id }}</td>
                        <td style="width: ;">
                            <input type="text" name="name" size="20" value="{{ $row->name }}"
                                class="form-control form-control-sm">
                            @error('name')
                                {{ $message }}
                            </td>
                        @enderror
                    </tr>
                </thead>
            </table>
            <div align="center">
                <a href="#" class="btn btn-sm mycolor1">수정</a>
                <a href="#" class="btn btn-sm mycolor1" onclick="return  confirm('삭제할까요?')">삭제</a>
                <input type="submit" class="btn btn-sm mycolor1" value="저장">
                <input type="button" class="btn btn-sm mycolor1" value="이전화면" onclick="history.back();">
            </div>
    </form>
@endsection
