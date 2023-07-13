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
    <form name="form1" method="post" action="">
        <div class="container mt-2">
            <table class="table table-sm table-bordered table-hover mymargin5">
                <thead>
                    <tr>
                        <td style="width: 20%;" class="mycolor2" >번호</td>
                        <td style="width: 80%;">{{ $row->id }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">이름</td>
                        <td style="width: 80%;">
                            {{ $row->name }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">아이디</td>
                        <td style="width: 80%;">
                            {{ $row->uid }}

                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">암호</td>
                        <td style="width: 80%;">
                            {{ $row->pwd }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">전화</td>
                        <td colspan="3">
                            {{ $tel }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">등급</td>
                        <td style="width: 80%;">{{ $rank }}</td>
                    </tr>
                </thead>
            </table>
            <div align="center">
                <a href="{{ route('member.edit', $row->id) }}" class="btn btn-sm mycolor1">수정</a>
                <form action="{{ route('member.destroy', $row->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" href="#" class="btn btn-sm mycolor1"
                        onclick="return confirm('삭제할까요?');">삭제</button>
                </form>
                <input href="#" type="submit" class="btn btn-sm mycolor1" value="저장">
                <input href="#" type="submit" class="btn btn-sm mycolor1" value="이전화면">
            </div>
        </div>
    </form>
@endsection
