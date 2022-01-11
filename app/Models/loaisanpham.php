<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class loaisanpham extends Model
{
    use HasFactory;
    protected $fillable = [
        'TENLOAISP',
        //'MASP',
        'TRANGTHAI',
    ];
    protected $primarykey = 'id';
    protected $table = 'loaisanpham';
    // public function edit($request,$id){
    //    return DB::update('update loaisanpham set TENLOAISP = ? where Id = ?', [$request->TENLOAISP,$id]);
    // }
}
