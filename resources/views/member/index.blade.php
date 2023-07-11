@extends('main')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">사용자</div>

    <script>
        function find_txt() {
            form1.action = "#"
            form1.submit();
        }
    </script>

        <div class="row align-items-center">
            <div class="col-3 text-end">
                <div class="input-group input-group-sm">
                    <span class="input-group-text">이름</span>
                    <input type="text" class="form-control" onkeydown="if (event.keyCode==13) { find_txt() }"
                        placeholder="찾을 이름" aria-label="Username" aria-describedby="basic-addon1">
                    <button class="btn mycolor1" type="button" onclick="find_txt()">검색</button>
                </div>
            </div>
            <div class="col-3 align-items-end">
                <a href="{{ route('member.create') }}" class="btn btn-sm btn-primary">추가</a>
            </div>
        </div>



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
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center my-5">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
    </div>
@endsection
