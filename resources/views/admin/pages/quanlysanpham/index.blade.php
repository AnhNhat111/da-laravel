@extends('admin.Layouts.layoutmaster')

@section('body')

<a href="{{ route('QLsanpham.create') }}"><button type="button" class="btn btn-success">Thêm</button></a>
<table class="table">
    <thead>
        <tr>
            <th>Loại sản phẩm</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Màu</th>
            <th>Size</th>
            <th>Giá</th>
            <th>Số lượng tồn</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pro as $row)
        <tr>
            <th>{{$row->TENLOAISP}}</th>
            <th>{{$row->TENSP}}</th>
            <th>{{$row->MOTA}}</th>
            <th>{{$row->COLOR}}</th>
            <th>{{$row->SIZE}}</th>
            <th>{{$row->GIABAN}}</th>
            <th>{{$row->SLTK}}</th>
            <th>{{$row->HINHANH}}</th>
            <td class="text-center">
                @if ($row->TRANGTHAI == 1)
                
                <span class="badge badge-
                success">Yes</span>
                
                @else
                
                <span class="badge badge-
                danger">No</span>
                
                @endif
                </td>
            <td class="d-inline-flex">
                <a href="{{ route('QLsanpham.edit',$row->id) }}"><button type="button" class="btn btn-primary btn-sm">Sửa</button> </a>
                <form action="{{ route('QLsanpham.destroy',$row->id) }}" method="POST">
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
