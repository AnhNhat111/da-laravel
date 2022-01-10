<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\loaitaikhoan;
use App\Models\taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QuanLyTaiKhoanController extends Controller
{
    protected $table = "taikhoan";
    protected $model;
    function __construct()
    {
        // $this->middleware('guest:admin')->except('logout');
        $this->model = new taikhoan();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = DB::table('loaitaikhoan as ltk')
				->rightJoin('taikhoan as tk', 'ltk.id','tk.LOAITK_ID')
				->select('tk.id','ltk.TENLOAITAIKHOAN','tk.TENDANGNHAP','tk.TENHIENTHI','tk.SODIENTHOAI','tk.EMAIL','tk.TRANGTHAI')->get();
        return view('admin.pages.quanlytaikhoan.index', [
            'tk'=> $getData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaitk = DB::table('loaitaikhoan')->select('id','TENLOAITAIKHOAN')->get();
        return view('admin.pages.quanlytaikhoan.create')->with('loaitk',$loaitk);
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
            "LOAITK_ID"=>'',
            "EMAIL" => 'required|string|unique:taikhoan,EMAIL',
            "TENDANGNHAP" => 'required|string|unique:taikhoan,TENDANGNHAP',
            "MATKHAU" =>  'required|string',
            "TENHIENTHI" => 'required|string',
            "SODIENTHOAI" => 'required|string|unique:taikhoan,SODIENTHOAI',    
            "TRANGTHAI"=> '',
        ]);
        $create = $this->model::create([
            "LOAITK_ID" => $data['LOAITK_ID'],
            "EMAIL" => $data['EMAIL'],
            "TENDANGNHAP" => $data['TENDANGNHAP'],
            "MATKHAU" => bcrypt($data['MATKHAU']),
            "TENHIENTHI" => $data['TENHIENTHI'],
            "SODIENTHOAI" => $data['SODIENTHOAI'],     
            "TRANGTHAI" => $data['TRANGTHAI'] ? 1 : 0,
        ]);
        if ($create->save()) {
            return redirect()->route('quan-ly-tai-khoan.index');
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
        $loaitk = DB::table('loaitaikhoan')->select('id','TENLOAITAIKHOAN')->get();
        $tk = DB::table('taikhoan')->select('id','TENDANGNHAP','TENHIENTHI','SODIENTHOAI','EMAIL','TRANGTHAI')->where('id',$id)->get();
        return view('admin.pages.quanlytaikhoan.edit', [
            'loaitk' => $loaitk, 
            'tk' => $tk
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
        $loaitk = $this->model::find($id);
        if (!$loaitk) {
            return back()->withInput();
        }
        $loaitk->LOAITK_ID = $request->TENLOAITAIKHOAN;
        $loaitk->EMAIL = $request->EMAIL;
        $loaitk->TENDANGNHAP = $request->TENDANGNHAP;
        $loaitk->TENHIENTHI = $request->TENHIENTHI;
        $loaitk->SODIENTHOAI = $request->SODIENTHOAI;
        $loaitk->TRANGTHAI = $request->TRANGTHAI ? 1 : 0;
        if ($loaitk->save()) {
            return redirect()->route('quan-ly-tai-khoan.index');
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
        $kq = DB::delete('delete from taikhoan where id = ?', [$id]);
        return redirect()->route('quan-ly-tai-khoan.index');
    }
}
