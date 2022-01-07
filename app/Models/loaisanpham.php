<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    use HasFactory;
    protected $fillable = [
        'Id',
        'TENLOAISP',
        'MASP',
        'TRANGTHAI',
    ];
    protected $primarykey = 'Id';
    protected $table = 'loaisanpham';
}
