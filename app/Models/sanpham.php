<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $fillable = [
        'Id',
        'LOAISP_ID',
        'TENSP',
        'TRANGTHAI',
        'HINHANH',
        'MOTA',
        'SLTK',
    ];
    protected $primarykey = 'Id';
    protected $table = 'sanpham';
}
