<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class taikhoan extends Authenticatable
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
    public function giohang()
    {
        return $this->belongsTo(giohang::class, 'TAIKHOAN_ID');
    }
}
