@extends('admin.Layouts.layoutmaster')

@section('body')
<table class="table">
    <thead>
        <tr>
            
            <th>Tài Khoản</th>
            <th>Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Tổng Tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->TAIKHOAN_ID}}</td>               
                <td>{{ $row->SANPHAM_ID}}</td>
                <td>{{ $row->SOLUONG}}</td>
                <td>{{ $row->TONGTIEN}}</td>
                <td>{{ $row->created_at}}</td>
                <td>{{ $row->updated_at}}</td>

            </tr>
        @endforeach
    </tbody>
</table>
@endsection
