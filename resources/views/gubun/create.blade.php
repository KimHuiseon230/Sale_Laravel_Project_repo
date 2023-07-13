@extends('main')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">구분</div>
    <form name="form1" method="post" action="{{ route('gubun.store') }}{{ $tmp }}">
        @csrf
        <div class="container-fluid mt-2">
            <table class="table table-sm table-bordered table-hover mymargin5">
                <thead>
                    <tr>
                        <th style="color: red">번호</th>
                        <th style="color: red">구분명</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="text" name="name" size="20" value="{{ old('name') }}"
                                class="form-control form-control-sm">
                            @error('name')
                                {{ $message }}
                            </td>
                        @enderror
                </thead>
            </table>
            <div align="center">
                <input type="submit" class="btn btn-sm mycolor1" value="저장">
                <input type="button" class="btn btn-sm mycolor1" value="이전화면" onclick="history.back();">
            </div>
    </form>
@endsection
