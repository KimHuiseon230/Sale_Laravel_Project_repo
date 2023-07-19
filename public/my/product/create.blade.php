@extends('main')
{{-- 내용 --}}
@section('content')
    <div class="alert mycolor1" role="alert">제품</div>
    <form name="form1" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container mt-2">
            <table class="table table-sm table-bordered table-hover mymargin5">
                <thead>
                    <tr class="mycolor2">
                        <th style="width: 20%;" class="mycolor2" style="color: red">번호</th>
                        <td style="width: 80%;" align="left"></td>
                    </tr>
                    <tr>
                        <th style="width: 20%;" class="mycolor2" style="color: red">구분명</th>
                        <td style="width: 80%;" align="left">
                            <select name="gubuns_id" id="">
                                <option value="" selected>선택하세요</option>
                                @foreach ($list as $row)
                                    @if ($row->gubuns_id == $row->id)
                                        <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                                    @else
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 20%;" class="mycolor2" style="color: red">제품명</th>
                        <td style="width: 80%;" align="left">
                            <input type="text" name="name" size="20" value="{{ old('name') }}"
                                class="form-control form-control-sm">
                            @error('name')
                                {{ $message }}
                            </td>
                        @enderror
                    </tr>
                    <tr>
                        <th style="width: 20%;" class="mycolor2">단가</th>
                        <td style="width: 80%;" align="left">
                            <input type="text" name="price" size="20" value="{{ old('price') }}"
                                class="form-control form-control-sm">
                            @error('price')
                                {{ $message }}
                            </td>
                        @enderror
                    </tr>
                    <tr>
                        <th style="width: 20%;" class="mycolor2">재고</th>
                        <td style="width: 80%;" align="left">
                            <input type="text" name="jaego" size="20" value="{{ old('jaego') }}"
                                class="form-control form-control-sm">
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 20%;" class="mycolor2">사진</th>
                        <td style="width: 80%;" align="left">
                            <input type="file" name="pic" size="20" value="{{ old('pic') }}"
                                class="form-control form-control-sm">
                        </td>
                    </tr>
                </thead>
            </table>
            <div align="center">
                <input type="submit" class="btn btn-sm mycolor1" value="저장">
                <input type="button" class="btn btn-sm mycolor1" value="이전화면" onclick="history.back();">
            </div>
    </form>
@endsection