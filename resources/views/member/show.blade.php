@extends('main')
{{-- 내용 --}}
@section('content')
    <?php
    $tel1 = trim(substr($row->tel, 0, 3));
    $tel2 = trim(substr($row->tel, 3, 4));
    $tel3 = trim(substr($row->tel, 7, 4));
    $tel = $tel1 . '-' . $tel2 . '-' . $tel3;
    $rank = $row->rank == 0 ? '직원' : '관리자';
    ?>
    <form  name="form1" method="post" action="">
        <div class="container-fluid mt-2" style="width: 450px;">
            <table class="table table-bordered table-sm m-5">
                <thead>
                    <tr>
                        <th style="width: 20%; text-align: center;">번호</th>
                        <td style="width: 80%;">{{ $row->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 20%; text-align: center;">이름</th>
                        <td style="width: 80%;">
                            {{ $row->name }}
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 20%; text-align: center;">아이디</th>
                        <td style="width: 80%;">
                            {{ $row->uid }}

                        </td>
                    </tr>
                    <tr>
                        <th style="width: 20%; text-align: center;">암호</th>
                        <td style="width: 80%;">
                            {{ $row->pwd }}
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 20%; text-align: center;">전화</th>
                        <td colspan="3">
                            {{ $tel }}
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 20%; text-align: center;">등급</th>
                        <td style="width: 80%;">{{ $rank }}</td>
                    </tr>
                </thead>
            </table>
            <div class="container" align="center">
                <a href="#" class="btn btn-sm mycolor1">수정</a>
                <form action="{{ route('member.destroy', $row->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" href="#" class="btn btn-sm mycolor1"
                        onclick="return confirm('삭제할까요?');">삭제</button>
                </form>
                <input href="#" type="submit" class="btn btn-sm mycolor1" value="저장">
                <input href="#" type="submit" class="btn btn-sm mycolor1" value="이전화면">
            </div>

    </form>
@endsection
