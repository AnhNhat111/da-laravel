@extends('admin.Layouts.layoutmaster')

@section('body')
<h1>Đây là trang quản lý sản phẩm</h1>
<table class="table">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Màu</th>
            <th>Size</th>
            <th>Loại sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng tồn</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pro as $row)
        <tr>
            <th>{{$row->TENSP}}</th>
            <th>{{$row->MOTA}}</th>
            <th>{{$row->COLOR}}</th>
            <th>{{$row->SIZE}}</th>
            <th>{{$row->LOAISP_ID}}</th>
            <th>{{$row->GIABAN}}</th>
            <th>{{$row->SLTK}}</th>
            <th>{{$row->HINHANH}}</th>
            <th>{{$row->TRANGTHAI}}</th>
            <th>Sửa || Xoá</th>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
