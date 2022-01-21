<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taikhoan extends Model
{
    use HasFactory;
    protected $fillable = [
        'password',
        'TENHIENTHI',
        'SODIENTHOAI',
        'email',
        'TRANGTHAI',
        'LOAITK_ID',
        'ANH',
        'DIACHI'
    ];
    protected $primarykey = 'id';
    protected $table ='taikhoan';
}
