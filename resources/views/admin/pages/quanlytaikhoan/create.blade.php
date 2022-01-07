<!DOCTYPE html>
<html lang="en">

@extends('admin.Layouts.layoutmaster')

@section('body')

    <form action="{{ route('loaisp.store') }}" method="post">
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
            <label for="my-input">Họ Tên</label>
            <input id="my-input" required class="form-control" type="text" name="TENHIENTHI">
            <label for="my-input">Số điện thoại</label>
            <input id="my-input" required class="form-control" type="text" name="SODIENTHOAI">
            <label for="my-input">Trạng thái</label>
            <input id="my-input" required class="form-control" type="text" name="TRANGTHAI">
        </div>
        <button name="submit" id="" class="btn btn-primary" type="submit">Thêm</button>
    </form>
@endsection