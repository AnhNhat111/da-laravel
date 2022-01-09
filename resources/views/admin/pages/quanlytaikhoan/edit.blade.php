@extends('admin.Layouts.layoutmaster')

@section('body')
<h1>Đây là trang sửa loại sản phẩm</h1>
<form action="{{ route('quan-ly-tai-khoan.update',$id) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
            <label for="my-input">Loại tài khoản</label>
            <input id="my-input" required class="form-control" type="text" name="LOAITK_ID" value="{{ $data->LOAITK_ID }}">
            <label for="my-input">Email</label>
            <input id="my-input" required class="form-control" type="text" name="EMAIL" value="{{ $data->EMAIL }}">
            <label for="my-input">Tên đăng nhập</label>
            <input id="my-input" required class="form-control" type="text" name="TENDANGNHAP" value="{{ $data->TENDANGNHAP }}">
          
            <label for="my-input">Tên Hiển Thị</label>
            <input id="my-input" required class="form-control" type="text" name="TENHIENTHI" value="{{ $data->TENHIENTHI }}">
            <label for="my-input">Số điện thoại</label>
            <input id="my-input" required class="form-control" type="text" name="SODIENTHOAI" value="{{ $data->SODIENTHOAI }}">
            <label for="my-input">Trạng thái</label>
            <input id="my-input" required class="form-control" type="text" name="TRANGTHAI" value="{{ $data->TRANGTHAI }}">
        </div>
        <button name="submit" id="" class="btn btn-primary" type="submit">Sửa</button>
</form>
@endsection