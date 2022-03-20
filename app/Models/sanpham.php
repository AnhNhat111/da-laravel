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
        $query = 'select * from sanpham ';
        return selectWithParam($query);
    }
    public function chitietsanpham($id)
    {
        $query = 'select * from sanpham 
        inner join loaisanpham on loaisanpham.id = sanpham.LOAISP_ID
        where sanpham.id = ' . $id;
        return selectWithParam($query);
    }
    public function kichthuoc($id)
    {
        $query = 'select * from chitietsanpham 
        where chitietsanpham.SANPHAM_ID = ' . $id;
        return selectWithParam($query);
    }
    public function mausac($id)
    {
        $query = 'select distinct COLOR from chitietsanpham 
        where chitietsanpham.SANPHAM_ID = ' . $id;
        return selectWithParam($query);
    }
}
