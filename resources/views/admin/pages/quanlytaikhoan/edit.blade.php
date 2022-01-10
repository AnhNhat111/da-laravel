@extends('admin.Layouts.layoutmaster')

@section('body')
<h1>Đây là trang sửa tài khoản</h1>
<form action="{{ route('quan-ly-tai-khoan.update',$tk[0]->id) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="loataikhoan">Loại Tài Khoản</label>
            <select class="form-control" id="TENLOAITAIKHOAN" name="TENLOAITAIKHOAN" required>
                <option value="">--Loại Tài Khoản --</option>
                @foreach($loaitk as $ltk)
                    <option value="{!! $ltk->id !!}" {!! ($tk[0]->id == $ltk->id) ? 'selected="selected"' : null !!}>{!! $ltk->TENLOAITAIKHOAN !!}</option>
                @endforeach
            </select>
            <label for="my-input">Email</label>
            <input id="my-input" required class="form-control" type="text" name="EMAIL" value="{{ $tk[0]->EMAIL }}">
            <label for="my-input">Tên đăng nhập</label>
            <input id="my-input" required class="form-control" type="text" name="TENDANGNHAP" value="{{ $tk[0]->TENDANGNHAP }}">
          
            <label for="my-input">Tên Hiển Thị</label>
            <input id="my-input" required class="form-control" type="text" name="TENHIENTHI" value="{{ $tk[0]->TENHIENTHI }}">
            <label for="my-input">Số điện thoại</label>
            <input id="my-input" required class="form-control" type="text" name="SODIENTHOAI" value="{{ $tk[0]->SODIENTHOAI }}">
            {{-- <label for="my-input">Trạng thái</label>
            <input id="my-input" required class="form-control" type="text" name="TRANGTHAI" value="{{ $tk[0]->TRANGTHAI }}"> --}}
            <div class="form-group">
                <div class="form-check">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox"
                id="TRANGTHAI" name="TRANGTHAI"
                {{ $tk[0]->TRANGTHAI == 1 ? 'checked' : ''}}
                />Trạng thái
                </label>
                </div>
            </div>
    </div>
        <button name="submit" id="" class="btn btn-primary" type="submit">Sửa</button>
</form>
@endsection