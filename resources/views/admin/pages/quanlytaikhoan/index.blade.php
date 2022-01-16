@extends('admin.Layouts.layoutmaster')

@section('body')

@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
<a href="{{ route('quan-ly-tai-khoan.create') }}"><button type="button" class="btn btn-success">Thêm</button></a>
<table class="table">
    <thead>
        <tr style="align-items: center">
            <th>Loại Tài Khoản</th>
            <th>Username</th>
            <th>Tên Hiển Thị</th>
            <th>SDT</th>    
            <th>Email</th>
            <th>Trạng thái</th>
            <th>Tình trạng</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($tk as $user )
            <tr>
                <td>{{ $user->TENLOAITAIKHOAN }}</td>
                <td>{{ $user->TENDANGNHAP }}</td>
                <td>{{ $user->TENHIENTHI }}</td>
                <td>{{ $user->SODIENTHOAI }}</td>
                <td>{{ $user->EMAIL}}</td>
                {{-- <td>{{ $user->TRANGTHAI }}</td> --}}
                <td class="text-center">
                    @if ($user->TRANGTHAI == 1)
                    
                    <span class="badge badge-
                    success">Yes</span>
                    
                    @else
                    
                    <span class="badge badge-
                    danger">No</span>
                    
                    @endif
                    </td>
                <td class="d-inline-flex">
                    <a href="{{ route('quan-ly-tai-khoan.edit',$user->id) }}"><button type="button" class="btn btn-primary btn-sm">Sửa</button> </a>
                    <form action="{{ route('quan-ly-tai-khoan.destroy',$user->id) }}" method="POST">
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
