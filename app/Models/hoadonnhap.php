<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadonnhap extends Model
{
    use HasFactory;
    protected $fillable = [
        'TAIKHOAN_ID',
        'SANPHAM_ID',
        'NGAYNHAP',
        'NHACUNGCAP',
        'TRANGTHAI',
        'SOLUONG',
        'TONGTIEN',
    ];

    protected $table ='hoadonnhap';
}
