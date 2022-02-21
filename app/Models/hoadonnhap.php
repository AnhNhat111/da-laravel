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
        'NHACUNGCAP',
        'TRANGTHAI',
        'TONGSL',
        'TONGTIEN',
    ];

    protected $table ='hoadonnhap';
}
