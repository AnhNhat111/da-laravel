<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietsanpham extends Model
{
    use HasFactory;
    protected $fillable = [
        'SANPHAM_ID',
        'SLTK',
        'TRANGTHAI',
        'COLOR',
        'SIZE'
    ];
    protected $primarykey = 'id';
    protected $table = 'chitietsanpham';
}
