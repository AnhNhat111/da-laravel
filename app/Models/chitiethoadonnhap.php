<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitiethoadonnhap extends Model
{
    use HasFactory;
    protected $fillable = [
        'HDNHAP_ID',
        'SANPHAM_ID',
        'SOLUONG',
        'GIANHAP'
    ];
    protected $table ='cthd_nhap';
}
