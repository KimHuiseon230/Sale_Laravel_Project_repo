@extends('main')
{{-- 내용 --}}
@section('content')
    <form name="form1" method="post" action="{{ route('member.update', $row->id) }}{{ $tmp }}">
        @csrf
        @method('PATCH')
        <div class="container-fluid mt-2" style="width: 450px;">
            <table class="table table-sm table-bordered table-hover mymargin5">
                <thead>
                    <tr>
                        <th style="width: 20%; text-align: center;">번호</th>
                        <td style="width: 80%;">{{ $row->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%; text-align: center;">이름</th>
                        <td style="width: 80%;">
                            <input type="text" name="name" size="20" value="{{ $row->name }}"
                                class="form-control form-control-sm">
                            @error('name')
                                {{ $message }}
                            </td>
                        @enderror
                    </tr>
                    <tr>
                        <th style="width: 20%; text-align: center;">아이디</th>
                        <td style="width: 80%;">
                            <input type="text" name="uid" size="20"value="{{ $row->uid }}"
                                class="form-control form-control-sm">
                            @error('uid')
                                {{ $message }}
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 20%; text-align: center;">암호</th>
                        <td style="width: 80%;">
                            <input type="text" name="pwd" size="20" value="{{ $row->pwd }}" maxlength="20"
                                class="form-control form-control-sm">
                            @error('pwd')
                                {{ $message }}
                            @enderror
                        </td>
                    </tr>
                    <?php
                    $tel1 = trim(substr($row->tel, 0, 3));
                    $tel2 = trim(substr($row->tel, 3, 4));
                    $tel3 = trim(substr($row->tel, 7, 4));
                    
                    ?>
                    <tr>
                        <th style="width: 20%; text-align: center;">전화</th>
                        <td colspan="3">
                            <div class="d-inline-flex">
                                <input type="text" name="tel1" size="3" maxlength="3"
                                    value="{{ $tel1 }}" class="form-control form-control-sm">-
                                <input type="text" name="tel2" size="4" maxlength="4"
                                    value="{{ $tel2 }}" class="form-control form-control-sm">-
                                <input type="text" name="tel3" size="4" maxlength="4"
                                    value="{{ $tel3 }}" class="form-control form-control-sm">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td clasa="mycolor2" style="width: 20%; text-align: center;">등급</td>
                        <td>
                            @if ($row->rank == 0)
                                <input type="radio" name="rank" value="0" checked>직원
                                <input type="radio" name="rank" value="1">관리자
                            @else
                                <input type="radio" name="rank" value="0">직원
                                <input type="radio" name="rank" value="1"checked>관리자
                            @endif
                        </td>
                    </tr>
                </thead>
            </table>
            <div class="container" align="center">
                <a href="#" class="btn btn-sm mycolor1">수정</a>
                <a href="#" class="btn btn-sm mycolor1" onclick="return  confirm('삭제할까요?')">삭제</a>
                <input type="submit" class="btn btn-sm mycolor1" value="저장">
                <input type="button" class="btn btn-sm mycolor1" value="이전화면" onclick="history.back();">
            </div>


    </form>
@endsection
