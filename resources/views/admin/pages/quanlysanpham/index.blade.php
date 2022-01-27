@extends('admin.Layouts.layoutmaster')

@section('body')

<a href="{{ route('QLsanpham.create') }}"><button type="button" class="btn btn-success">Thêm</button></a>
<table class="table">
    <thead>
        <tr>
            <th>Loại sản phẩm</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pro as $row)
        <tr>
            <th>{{$row->TENLOAISP}}</th>
            <th>{{$row->MASP}}</th>
            <th>{{$row->TENSP}}</th>
            <th>{{$row->MOTA}}</th>
            <th>{{$row->GIABAN}}</th>
            <th>
                <img alt="{{ $row->MASP }}" src={{ asset('assets/user/img/product/'.$row->HINHANH ) }} style="text-align: center; vertical-align: middle; width: 60px;">
            </th>
            <th>
                <td class="text-center">
                    @if ($row->TRANGTHAI == 1)

                    <span class="badge badge-
                    success">Yes</span>

                    @else

                    <span class="badge badge-
                    danger">No</span>

                    @endif
                 </td>
            </th>
           <th>
            <td class="d-inline-flex">
                <table>
                    <td>
                        <a href="{{ route('chi-tiet-san-pham.show',$row->id) }}"><button type="button" class="btn btn-primary btn-sm">Chi tiết</button> </a>
                        <a href="{{ route('QLsanpham.edit',$row->id) }}"><button type="button" class="btn btn-primary btn-sm">Sửa</button> </a>
                    </td>
                    <td>
                        <form action="{{ route('QLsanpham.destroy',$row->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button style="margin-left: 10px" type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </table>
            </td>
           </th>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection
