<!DOCTYPE html>
<html lang="en">

@extends('admin.Layouts.layoutmaster')

@section('body')

    <form action="{{ route('quan-ly-tai-khoan.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="my-input">Loại tài khoản</label>
            <input id="my-input" required class="form-control" type="text" name="LOAITK_ID">
            <label for="my-input">Email</label>
            <input id="my-input" required class="form-control" type="text" name="EMAIL">
            <label for="my-input">Tên đăng nhập</label>
            <input id="my-input" required class="form-control" type="text" name="TENDANGNHAP">
            <label for="my-input">Mật khẩu</label>
            <input id="my-input" required class="form-control" type="text" name="MATKHAU">
            <label for="my-input">Tên Hiển Thị</label>
            <input id="my-input" required class="form-control" type="text" name="TENHIENTHI">
            <label for="my-input">Số điện thoại</label>
            <input id="my-input" required class="form-control" type="text" name="SODIENTHOAI">
            <label for="my-input">Trạng thái</label>
            <input id="my-input" required class="form-control" type="text" name="TRANGTHAI">
            {{-- <label style="margin-top: 20px" for="status"> Trạng thái</label><br>
            <input type="checkbox" id="status" name="TRANGTHAI" value="1"> --}}
            
        </div>
        <button name="submit" id="" class="btn btn-primary" type="submit">Thêm</button>
    </form>
@endsection