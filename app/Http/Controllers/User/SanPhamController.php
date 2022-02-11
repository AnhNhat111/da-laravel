<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\sanpham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    protected $table = "sanpham";
    protected $model;
    function __construct()
    {
        $this->model = new sanpham();
    }
    function danhsach()
    {
        $data = $this->model->danhsachsp();
        return view('user.pages.product', [
            'data' => $data
        ]);
    }
    function chitietsp($id)
    {
        $data = $this->model->chitietsanpham($id);
        $size = $this->model->kichthuoc($id);
        $color = $this->model->mausac($id);
        return view('user.pages.product-detail', [
            'data' => $data,
            'size' => $size,
            'color' => $color
        ]);
    }
}
