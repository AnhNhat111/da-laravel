<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class admin extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'password',
        'TENHIENTHI',
        'SODIENTHOAI',
        'email',
        'TRANGTHAI',
        'LOAITK_ID',
        'DIACHI'
    ];
    protected $primarykey = 'id';
    protected $table ='admin';
}
