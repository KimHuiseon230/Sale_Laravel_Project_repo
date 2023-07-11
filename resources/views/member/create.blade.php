@extends('main')
{{-- 내용 --}}
@section('content')
  <form name="form1" method="post" action="{{ route('member.store') }}">
    @csrf
      <div class="container-fluid mt-2" style="width: 450px;">
        <table class="table table-bordered table-sm m-5">
          <thead>
            <tr>
              <th style="width: 20%; text-align: center;">번호</th>
              <td style="width: 80%;"></td>
            </tr>
            <tr>
              <th style="width: 20%; text-align: center;">이름</th>
              <td style="width: 80%;">
                <input type="text" name="name" size="20" value="" class="form-control form-control-sm">
              </td>
            </tr>
            <tr>
              <th style="width: 20%; text-align: center;">아이디</th>
              <td style="width: 80%;">
                <input type="text" name="uid" size="20" value="" class="form-control form-control-sm">
              </td>
            </tr>
            <tr>
              <th style="width: 20%; text-align: center;">암호</th>
              <td style="width: 80%;">
                <input type="text" name="pwd" size="20" value="" maxlength="3" class="form-control form-control-sm">
              </td>
            </tr>
            <tr>
              <th style="width: 20%; text-align: center;">전화</th>
              <td colspan="3">
                <div class="d-inline-flex">
                  <input type="text" name="tel1" size="3" maxlength="3" value="" class="form-control form-control-sm">-
                  <input type="text" name="tel2" size="4" maxlength="4" value="" class="form-control form-control-sm">-
                  <input type="text" name="tel3" size="4" maxlength="4" value="" class="form-control form-control-sm">
                </div>
              </td>
            </tr>
            <tr>
              <th style="width: 20%; text-align: center;">등급</th>
              <td style="width: 80%;">관리자</td>
            </tr>
            <tr>
              <td clasa="mycolor2" style="width: 20%; text-align: center;">등급</td>
              <td>
                <input type="radio" name="rank" value="0" checked>직원
                <input type="radio" name="rank" value="1" checked>관리자
              </td>
            </tr>
          </thead>
        </table>
        <div class="container" align="center">
          <a href="#" class="btn btn-sm mycolor1">수정</a>
          <a href="#" class="btn btn-sm mycolor1" onclick="return  confirm('삭제할까요?')">삭제</a>
          <input href="#" type="submit" class="btn btn-sm mycolor1" value="저장">
          <input href="#" type="submit" class="btn btn-sm mycolor1" value="이전화면">
        </div>
    </form>
@endsection
