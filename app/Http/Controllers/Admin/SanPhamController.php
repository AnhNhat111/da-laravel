<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\sanpham;

class SanPhamController extends Controller
{

    protected $table = "sanpham";
    protected $model;
    function __construct()
    {
        // $this->middleware('guest:admin')->except('logout');
        $this->model = new sanpham();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $pro = DB::table('loaisanpham as lsp')
				->rightJoin('sanpham as sp', 'lsp.id','sp.LOAISP_ID')
				->select('*')->get();
        return view('admin.pages.quanlysanpham.index',[
            'pro'=> $pro
        ]);
       
        
        // $pro = DB::table('sanpham')->select('*');
        // $pro = $pro -> get();
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaisp = DB::table('loaisanpham')->select('id','TENLOAISP')->get();
        return view('admin.pages.quanlysanpham.create')->with('loaisp',$loaisp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "LOAISP_ID" => '',    
            "TENSP"=>'string|',
            "TRANGTHAI"=>'',
            "HINHANH" => 'required|string',
            "MOTA" => 'required|string',
            "GIABAN" => 'required',    
            "SLTK"=> 'required', 
            "COLOR" =>  'required|string',
            "SIZE" => 'required|string',
        ]); 
       
        $create = $this->model::create([
            "LOAISP_ID" => $data['LOAISP_ID'],    
            "TENSP"=> $data['TENSP'],
            "TRANGTHAI"=>$data['TRANGTHAI'] = 1,
            "HINHANH" => $data['HINHANH'],
            "MOTA" => $data['MOTA'],
            "GIABAN" => $data['GIABAN'],    
            "SLTK"=> $data['SLTK'], 
            "COLOR" => $data['COLOR'],
            "SIZE" => $data['SIZE'],
        ]);
        if ($create->save()) {
            return redirect()->route('QLsanpham.index');
        }
        return back()->withInput();
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
        $lsp = DB::table('loaisanpham')->select('id','TENLOAISP')->get();
        $sp = DB::table('sanpham')->select('*')->where('id',$id)->get();
        return view('admin.pages.quanlysanpham.edit', [
            'loaisp' => $lsp, 
            'sp' => $sp
        ]);
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
        $sp = $this->model::find($id);
        if (!$sp) {
            return back()->withInput();
        }
       
       $sp->LOAISP_ID = $request->LOAISP_ID;

       $sp ->TENSP = $request->TENSP;
       
       $sp->TRANGTHAI = $request->TRANGTHAI ? 1 : 0;

       $sp->HINHANH = $request->HINHANH;

       $sp->MOTA = $request->MOTA;
       
       $sp->GIABAN = $request->GIABAN;
       
       $sp->SLTK = $request->SLTK;

       $sp->COLOR = $request->COLOR;
       
       $sp->SIZE = $request->SIZE;
       
       if ($sp->save()) {
        return redirect()->route('QLsanpham.index');
    }
    return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kq = DB::delete('delete from sanpham where id = ?', [$id]);
        return redirect()->route('QLsanpham.index');
    }
}
