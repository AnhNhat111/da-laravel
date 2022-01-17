@extends('admin.Layouts.layoutmaster')

@section('body')
<h1>Thêm sản phẩm</h1>
<div class="row">
    <div class="col-md-4">
        <form method="post" action="/Admin/SanPhamController/store">
            @method('PATCH')

            @csrf

            <div class="form-group">
                <label for="TENSP">Tên sản phẩm</label>
                <input class="form-control" name="TENSP" value="">
            </div>
            <div class="form-group">
                <label for="MOTA">Mô tả</label>
                <input class="form-control" name="MOTA" value="">
            </div>
            <div class="form-group">
                <label for="COLOR">Màu</label>
                <input class="form-control" name="COLOR" value="">
            </div>
            <div class="form-group">
                <label for="SIZE">Size</label>
                <input class="form-control" name="SIZE" value="">
            </div>
            <div class="form-group">
                <label for="LOAISP_ID">Mã loại sản phẩm</label>
                <input class="form-control" name="LOAISP_ID" value="">
            </div>
            <div class="form-group">
                <label for="GIA">Giá</label>
                <input class="form-control" name="GIA" value="">
            </div>
            <div class="form-group">
                <label for="SLTK">Số lượng tồn</label>
                <input class="form-control" name="SLTK" value="">
            </div>
            <div class="form-group">
                <label for="HINHANH">Hình ảnh</label>
                <input class="form-control" name="HINHANH" value="">
            </div>
            <div class="form-group">
                <label class="form-check-label" for="TRANGTHAI">Trạng thái</label>
                <input class="form-check-input" name="TRANGTHAI" value="">
            </div>
            <div class="form-group">
                <input type='submit' value='Thêm' class="form-control">
            </div>
        </form>
    </div>
</div>
@endsection
