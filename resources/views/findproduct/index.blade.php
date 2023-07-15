@extends('main_nomenu')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">제품선택</div>

    <script>
        function find_text() {
            form1.action = "{{ route('findproduct.index') }}"
            form1.submit();
        }

        function SendProduct(id, name, price) {
            opener.form1.products_id.value = id;
            opener.form1.products_name.value = name;
            opener.form1.price.value = price;
            opener.form1.prices.value = Number(price) * Number(opener.form1.numo.value);
        }
    </script>
    <form name="form1" action="" method="get">
        <div class="row">
            <div class="col-6" align="left">
                <div class="input-group input-group-sm">
                    <span class="input-group-text">이름</span>
                    <input class="form-control" type="text" name="text1" value=""
                        onkeydown="if(event.keyCode == 13) {find_text();}">
                    <button class="btn mycolor1 ms-1" type="button" onclick="find_text()">검색</button>
                </div>
            </div>
            <div class="col-6" align="right">

            </div>
        </div>
    </form>
    <table class="table table-sm table-bordered table-hover mymargin5">
        <thead>
            <tr class="mycolor2">
                <td style="width:20%">번호</td>
                <td style="width:20%">구분명</td>
                <td style="width:20%">제품명</td>
                <td style="width:20%">단가</td>
                <td style="width:20%">재고</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->gubun_name }}</td>
                    <td onclick="   window.close();">
                        <a href="javascript:SendProduct({{ $row->id }},'{{ $row->name }}',{{ $row->price }});">{{ $row->name }}</a>
                    
                    </td>
                    <td>{{ $row->prices }}</td>
                    <td>{{ $row->jaego }}</td>
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
