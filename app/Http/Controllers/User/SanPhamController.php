<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proU = DB::table('loaisanpham as lsp')
        ->rightJoin('sanpham as sp', 'lsp.id','sp.LOAISP_ID')
        ->select('*')->get();
        return view('user.pages.index',[
        'proU'=> $proU
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proU = DB::table('loaisanpham as lsp')
        ->rightJoin('sanpham as sp', 'lsp.id','sp.LOAISP_ID')
        ->select('*')->where('sanpham as sp','sp.id','==',$id)->first()->get();
        return view('user.pages.product-detail',[
            'proU'=> $proU
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
=======
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
>>>>>>> 79cba21762eceaf8a30f1cb94ea1080ef6e0eaa5
}