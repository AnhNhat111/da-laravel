<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\chitietsanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ql_ctspController extends Controller
{

    protected $table = "chitietsanpham";
    protected $model;
    function __construct()
    {
        $this->model = new chitietsanpham();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
    }
    public function ctsp($id){
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masp = DB::table('sanpham')->select('id','MASP')->get();
        return view('admin.pages.chitietsanpham.create')->with('masp',$masp);
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
            "SANPHAM_ID" => '',    
            "SLTK"=>'required',
            "TRANGTHAI"=>'',
            "COLOR" => 'required|string',
            "SIZE" => 'required|string',
        ]); 
       
        $create = $this->model::create([
            "SANPHAM_ID" => $data['SANPHAM_ID'],    
            "SLTK" => $data['SLTK'],
            "COLOR" => $data['COLOR'],
            "SIZE" => $data['SIZE'],    
            "TRANGTHAI"=>$data['TRANGTHAI'] = 1,
        ]);
        
        if ($create->save()) {
            return redirect()->route('chi-tiet-san-pham.show',$request->SANPHAM_ID);
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
        $data = $this->model::find($id);
        $pro = DB::table('sanpham as sp')
        ->rightJoin('chitietsanpham as ctsp', 'sp.id','ctsp.SANPHAM_ID')
        ->select('*')->where('sp.id',$id)->get();
   
            return view('admin.pages.chitietsanpham.index',[
                'pro'=> $pro
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
        $ctsp = DB::table('chitietsanpham')->select('*')->where('id',$id)->get();
        $sp = DB::table('sanpham')->select('*')->where('id',$id)->get();
        return view('admin.pages.chitietsanpham.edit', [
            'ctsp' => $ctsp, 
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
        $ctsp = $this->model::find($id);
        if (!$ctsp) {
            return back()->withInput();
        }
       


       $ctsp->SLTK = $request->SLTK;
       
       $ctsp->COLOR = $request->COLOR;

       $ctsp->SIZE = $request->SIZE;

       $ctsp->TRANGTHAI = $request->TRANGTHAI ? 1 : 0;


       
       if ($ctsp->save()) {
        return redirect()->route('chi-tiet-san-pham.show',$ctsp->id);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kq = DB::delete('delete from chitietsanpham where id = ?', [$id]);
        return redirect()->route('chitietsanpham.index');
    }
}
