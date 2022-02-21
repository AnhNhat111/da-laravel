<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\hoadonnhap;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HoadonnhapController extends Controller
{
    protected $table = "hoadonnhap";
    protected $model;
    function __construct()
    {
        // $this->middleware('guest:admin')->except('logout');
        $this->model = new hoadonnhap();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = DB::table('hoadonnhap as hdn')
            ->rightJoin('sanpham as sp', 'sp.id', 'hdn.SANPHAM_ID')
            ->select('*')->get();

        return view('admin.pages.hoadonnhap.index', [
            'pro' => $pro
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masp = DB::table('sanpham')->get();
        $tk =  DB::table('admin')->select('id', 'TENHIENTHI')->get();

        return view('admin.pages.hoadonnhap.create', [
            'products' => $masp,
            'taikhoan' => $tk
        ]);
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
            "TAIKHOAN_ID" => 'string',
            "SANPHAM_ID" => 'string',
            "NHACUNGCAP" => 'required|string',
            "TONGSL" => '',
            "TONGTIEN" => '',
            'TRANGTHAI' => '',
        ]);

        $product = sanpham::find($data["SANPHAM_ID"]);

        $create = $this->model::create([
            "TAIKHOAN_ID" => $data['TAIKHOAN_ID'],
            "SANPHAM_ID" => $data['SANPHAM_ID'],
            "NHACUNGCAP" => $data['NHACUNGCAP'],
            "TONGSL" => $data['TONGSL'],
            "TONGTIEN" => $data['TONGSL'] * $product->GIABAN,
            "TRANGTHAI" => $data['TRANGTHAI'] = 1
        ]);

        if ($create->save()) {
            return redirect()->route('hoadonnhap.index');
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
        $kq = DB::delete('delete from hoadonhap where id = ?', [$id]);
        return redirect()->route('hoadonban.index');
    }
}
