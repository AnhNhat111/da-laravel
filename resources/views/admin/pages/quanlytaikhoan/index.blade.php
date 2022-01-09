@extends('admin.Layouts.layoutmaster')

@section('body')

<a href="{{ route('quan-ly-tai-khoan.create') }}"><button type="button" class="btn btn-success">Thêm</button></a>
<table class="table">
    <thead>
        <tr style="align-items: center">
            <th>Loại Tài Khoản</th>
            <th>Username</th>
            <th>Tên Hiển Thị</th>
            <th>SDT</th>    
            <th>Email</th>
            <th>Trangj thái</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
            <th>Tình trạng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $user )
            <tr>
                <td>{{ $user->LOAITK_ID }}</td>
                <td>{{ $user->TENDANGNHAP }}</td>
                <td>{{ $user->TENHIENTHI }}</td>
                <td>{{ $user->SODIENTHOAI }}</td>
                <td>{{ $user->EMAIL}}</td>
                <td>{{ $user->TRANGTHAI }}</td>
                <td>{{ $user->created_at}}</td>
                <td>{{ $user->updated_at}}</td>
                <td class="d-inline-flex">
                    <a href="{{ route('quan-ly-tai-khoan.edit',$user->Id) }}"><button type="button" class="btn btn-primary btn-sm">Sửa</button> </a>
                    <form action="{{ route('quan-ly-tai-khoan.destroy',$user->Id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button style="margin-left: 10px" type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
