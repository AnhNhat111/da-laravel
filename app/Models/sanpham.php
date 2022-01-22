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
        'MASP',// phân biệt các màu, và size
        'HINHANH',
        'MOTA',
        'GIABAN',
        
        'TRANGTHAI',
    ];
    protected $primarykey = 'id';
    protected $table = 'sanpham';
}
