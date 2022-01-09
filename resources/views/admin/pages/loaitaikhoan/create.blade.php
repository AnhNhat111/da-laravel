@extends('admin.Layouts.layoutmaster')

@section('body')
    <h1>Đây là trang tạo loại tài khoản</h1>
    <form action="{{ route('loaitaikhoan.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="my-input">Tên loại tài khoản</label>
            <input id="my-input" required class="form-control" type="text" name="TENlOAITAIKHOAN">
        </div>
        <button name="submit" id="" class="btn btn-primary" type="submit">Thêm</button>
    </form>
@endsection