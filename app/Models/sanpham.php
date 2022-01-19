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
        'HINHANH',
        'MOTA',
        'GIABAN',
        'SLTK',
        'TRANGTHAI',
    ];
    protected $primarykey = 'id';
    protected $table = 'sanpham';
}
