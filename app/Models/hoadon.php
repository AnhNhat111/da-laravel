<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    use HasFactory;
    protected $fillable = [
        'Id',
        'TAIKHOAN_ID',
        'DIACHI',
        'GHICHU',
        'TONGTIEN',
        'TRANGTHAI'
    ];
    protected $primarykey = 'Id';
    protected $table ='hoadon';
}
