@extends('admin.Layouts.layoutmaster')

@section('body')
<table class="table">
    <thead>
        <tr>
            
            <th>Tài Khoản</th>
            <th>Địa chỉ</th>
            <th>Ghi chú</th>
            <th>Tổng Tiền</th>
            <th>Trạng Thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->TAIKHOAN_ID}}</td>               
                <td>{{ $row->DIACHI}}</td>
                <td>{{ $row->GHICHU}}</td>
                <td>{{ $row->TONGTIEN}}</td>
                <td>{{ $row->TRANGTHAI}}</td>
                <td>{{ $row->created_at}}</td>
                <td>{{ $row->updated_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
