<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $fillable = [
        'LOAISP_ID',
        'TENSP',
        'MASP', // phân biệt các màu, và size
        'HINHANH',
        'MOTA',
        'GIABAN',

        'TRANGTHAI',
    ];
    protected $primarykey = 'id';
    protected $table = 'sanpham';
    public function danhsachsp()
    {
        $query = 'select * from sanpham 
        inner join chitietsanpham on sanpham.id = chitietsanpham.SANPHAM_ID
        inner join loaisanpham on sanpham.LOAISP_ID = loaisanpham.id';
        return selectWithParam($query);
    }
    public function chitietsanpham($id)
    {
        $query = 'select * from sanpham 
        inner join chitietsanpham on sanpham.id = chitietsanpham.SANPHAM_ID
        inner join loaisanpham on sanpham.LOAISP_ID = loaisanpham.id
        where sanpham.id = ' . $id;
        return selectWithParam($query);
    }
}
