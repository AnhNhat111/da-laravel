<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietsanpham extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'SANPHAM_ID',
        'MASP', // phân biệt các màu, và size
        'TRANGTHAI',
        'GIABAN',
        'COLOR',
        'SIZE'
    ];
    protected $primarykey = 'id';
    protected $table = 'ctsp';
}
