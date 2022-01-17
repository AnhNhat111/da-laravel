@extends('admin.Layouts.layoutmaster')

@section('body')
<h1>Đây là trang thêm sản phẩm</h1>
<div class="row">
    <div class="col-md-4">
        <form method="post" action="">
            <div class="form-group">
                <label for="control label">Mã sản phẩm</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="control label">Tên sản phẩm</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="control label">Mô tả</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="control label">Màu</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="control label">Size</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="control label">Mã loại sản phẩm</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="control label">Giá</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="control label">Số lượng tồn</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="control label">Hình ảnh</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="form-check-label">Trạng thái</label>
                <input class="form-check-input">
            </div>
            <div class="form-group">
                <input type='submit' value='Thêm' class="form-control">
            </div>
        </form>
    </div>
</div>
@endsection
