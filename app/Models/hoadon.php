<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    use HasFactory;
    protected $fillable = [
        'TAIKHOAN_ID',
        'DIACHI',
        'GHICHU',
        'TONGTIEN',
        'TRANGTHAI'
    ];
    protected $primarykey = 'id';
    protected $table ='hoadon';
}
