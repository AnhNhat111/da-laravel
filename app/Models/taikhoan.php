<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taikhoan extends Model
{
    use HasFactory;
    protected $fillable = [
        'TENDANGNHAP',
        'MATKHAU',
        'TENHIENTHI',
        'SODIENTHOAI',
        'SODIENTHOAI',
        'EMAIL',
        'TRANGTHAI',
        'LOAITK_ID'
    ];
    protected $primarykey = 'id';
    protected $table ='taikhoan';
}
