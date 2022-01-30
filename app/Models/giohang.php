<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giohang extends Model
{
    use HasFactory;
    protected $fillable = [
        'TAIKHOAN_ID',
        'SANPHAM_ID',
        'HOADON_ID',
        'SOLUONG',
        'TONGTIEN'
    ];
    protected $table = 'giohang';

    public function taikhoan(){
        return $this->hasMany(taikhoan::class, 'TAIKHOAN_ID', 'id');
    }
}
