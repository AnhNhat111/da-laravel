@extends('admin.Layouts.layoutmaster')

@section('body')
<h1>Đây là trang quản lý loại sản phẩm</h1>
<a href="{{ route('admin.loaisp.create') }}">Thêm</a>

<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên loại</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>

                <td>{{ $row->id}}</td>               
                <td>{{ $row->TENLOAISP}}</td>
                <td>{{ $row->created_at}}</td>
                <td>{{ $row->updated_at}}</td>
                <td><a href="{{ route('loaisp.edit',$row->id) }}">Sửa </a></td>
                <td><form action="{{ route('loaisp.destroy',$row->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Xóa</button>
                </form></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
