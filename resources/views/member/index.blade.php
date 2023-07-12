@extends('main')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">사용자</div>

    <script>
        function find_txt() {
            form1.action = "{{ route('member.index') }}"
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
                <a href="{{ route('member.create') }}" class="btn btn-sm mycolor1">추가</a>
            </div>
        </div>
    </form>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">이름</th>
                <th scope="col">아이디</th>
                <th scope="col">암호</th>
                <th scope="col">전화번호</th>
                <th scope="col">등급</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($list as $row)
                <?php
                $tel1 = trim(substr($row->tel, 0, 3));
                $tel2 = trim(substr($row->tel, 3, 4));
                $tel3 = trim(substr($row->tel, 7, 4));
                $tel = $tel1 . '-' . $tel2 . '-' . $tel3;
                $rank = $row->rank == 0 ? '직원' : '관리자';
                ?>
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>
                        <a href="{{ route('member.show', $row->id) }}">{{ $row->name }}</a>
                    </td>
                    <td>{{ $row->uid }}</td>
                    <td>{{ $row->pwd }}</td>
                    <td>{{ $tel }}</td>
                    <td>{{ $rank }}</td>
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
