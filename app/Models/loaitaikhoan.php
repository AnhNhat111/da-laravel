<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaitaikhoan extends Model
{
    use HasFactory;
    protected $fillable = [
        'TENLOAITAIKHOAN',
    ];
    protected $primarykey = 'id';
    protected $table ='loaitaikhoan';

    public function loaiTk()
    {
        return $this->hasMany(taikhoan::class,'LOAITK_ID','id');
    }
}