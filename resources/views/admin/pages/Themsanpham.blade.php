@extends('admin.Layouts.layoutmaster')

@section('body')
<h1>Đây là trang thêm sản phẩm</h1>
<div class="row">
    <div class="col-md-4">
        <form action="">
            <div class="form-group">
                <label for="control label">Mã sản phẩm</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="control label">Tên sản phẩm</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="control label">Số lượng</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="control label">Mã sản phẩm</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label for="control label">Mã sản phẩm</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <input type='submit' value='Thêm' class="form-control">
            </div>
        </form>
    </div>
</div>
@endsection