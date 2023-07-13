@extends('main')
{{-- 내용 --}}
@section('content')
    <form name="form1" method="post" action="{{ route('product.update', $row->id) }}"enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="container-fluid mt-2" style="width: 450px;">
            <table class="table table-sm table-bordered table-hover mymargin5">
                <thead>
                    <tr class="mycolor2">
                        <th style="width: 20%;" class="mycolor2">번호</th>
                        <td style="width: 80%;" align="left">{{ $row->id }}</td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2" style="color: red">구분명</td>
                        <td align="left">
                            <select name="gubuns_id" id="">
                                <option value="" selected>선택하세요</option>
                                @foreach ($list as $row1)
                                    @if ($row->gubuns_id == $row1->id)
                                        <option value="{{ $row1->id }}" selected>{{ $row1->name }}</option>
                                    @else
                                        <option value="{{ $row1->id }}">{{ $row1->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 20%;" class="mycolor2">제품명</th>
                        <td style="width: 80%;" align="left">
                            <input type="text" name="name" size="20" value="{{ $row->name }}"
                                class="form-control form-control-sm">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;" class="mycolor2">단가</td>
                        <td style="width: 80%;" align="left">
                            <input type="text" name="price" size="20" value="{{ $row->price }}"
                                class="form-control form-control-sm">
                            @error('price')
                                {{ $message }}
                            </td>
                        @enderror
                    </tr>
                    <tr>
                        <th style="width: 20%;" class="mycolor2">재고</th>
                        <td style="width: 80%;" align="left">
                            <input type="text" name="jaego" size="20" value="{{ $row->jaego }}"
                                class="form-control form-control-sm">
                            @error('jaego')
                                {{ $message }}
                            </td>
                        @enderror
                    </tr>
                    <tr>
                        <th style="width: 20%;" class="mycolor2">사진</th>
                        <td style="width: 80%;" align="left">
                            <input type="file" name="pic" size="20" value="{{ $row->pic }}"
                                class="form-control form-control-sm">
                            <br> <br>
                            <b>파일이름</b> :<?php $row->pic; ?> <br>
                            @if ($row->pic)
                                <img src="{{ asset('storage/product_img/' . $row->pic) }}" width="200"
                                    class="img-fluid img-thumbnail mymargin5">
                            @else
                                <img src="" width="200" height="150" class="img-fluid img-thumbnail mymargin5">
                            @endif
                        </td>

                    </tr>
            </table>
            <div class="container" align="center">
                <a href="#" class="btn btn-sm mycolor1">수정</a>
                <a href="#" class="btn btn-sm mycolor1" onclick="return  confirm('삭제할까요?')">삭제</a>
                <input type="submit" class="btn btn-sm mycolor1" value="저장">
                <input type="button" class="btn btn-sm mycolor1" value="이전화면" onclick="history.back();">
    </form>
@endsection
