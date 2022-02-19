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
        inner join sanpham on sanpham.id = giohang.SANPHAM_ID';
        return selectWithParam($query);
    }

    public function getDataId($id)
    {
        $query = 'select * from giohang gh
        inner join sanpham sp
        on gh.SANPHAM_ID = sp.id
        where gh.TAIKHOAN_ID = ' . $id;
        return selectWithParam($query);
    }

    public function getDuplicateId($tkId, $spId)
    {
        $query = 'select * from giohang gh
        where gh.TAIKHOAN_ID = ' . $tkId . ' and gh.SANPHAM_ID = ' . $spId;
        return selectWithParam($query);
    }

    public function addToCart($data = [])
    {
        $result = giohang::insert($data);
        return $result;
    }
    public function editQuantity($data)
    {
        $query = 'update giohang set SOLUONG = SOLUONG + 1 where TAIKHOAN_ID = ? and SANPHAM_ID = ?';
        $where = [
            $data->TAIKHOAN_ID,
            $data->SANPHAM_ID
        ];
        return editWithParam($query, $where);
    }
}
