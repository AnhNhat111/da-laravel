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
    protected $trangthai;
    function __construct()
    {
        $this->trangthai = config('setDefault.hoadon.giohang.TRANGTHAI');
    }
    public function taikhoan()
    {
        return $this->belongsTo(taikhoan::class, 'TAIKHOAN_ID');
    }
    public function getAllData()
    {
        $query = 'select * from giohang 
        inner join taikhoan on giohang.TAIKHOAN_ID = taikhoan.ID 
        inner join hoadon on hoadon.id = giohang.HOADON_ID 
        inner join sanpham on sanpham.id = giohang.SANPHAM_ID 
        where hoadon.TRANGTHAI =  ' . $this->trangthai;
        return selectWithParam($query);
    }
}
