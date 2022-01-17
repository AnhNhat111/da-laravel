<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\sanpham;
use Sanpham as GlobalSanpham;

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
        $pro = DB::table('sanpham')->select('*');
        $pro = $pro -> get();
        $pageName = 'Quản lý sản phẩm';
        return view('admin.pages.QLsanpham',compact('pro','pageName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/admin/pages/Themsanpham');

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
        $new_pro = new sanpham;
        $new_pro->TENSP = $request->TENSP;
        $new_pro->MOTA = $request->MOTA;
        $new_pro->GIABAN = $request->HINHANH;
        $new_pro->COLOR = $request->COLOR;
        $new_pro->SIZE = $request->SIZE;
        $new_pro->HINHANH = $request->HINHANH;
        $new_pro->SLTK = $request->SLTK;
        $new_pro->LOAISP_ID = $request->LOAISP_ID;
        $new_pro->save();

        return redirect()->action('Admin\SanPhamController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
