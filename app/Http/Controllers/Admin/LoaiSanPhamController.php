<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\loaisanpham;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class LoaiSanPhamController extends Controller
{
    protected $table = "loaisanpham";
    protected $model;
    function __construct()
    {
        // $this->middleware('guest:admin')->except('logout');
        $this->model = new loaisanpham();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->get();
        return view('admin.pages.loaisp.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.loaisp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "TENLOAISP" => $request->TENLOAISP
        ];
        $a = $this->model::create($data);
        if ($a->save()) {
            return redirect()->route('loaisp.index');
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
        $data = $this->model::find($id);
        return view('admin.pages.loaisp.edit', [
            'Id' => $id,
            'data' =>$data
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
        $loaisp = $this->model::find($id);
        if (!$loaisp) {
            return back()->withInput();
        }
        $loaisp->TENLOAISP = $request->TENLOAISP;
        if ($loaisp->save()) {
            return redirect()->route('loaisp.index');
        }
        return back()->withInput();

    // $data = $this->model->edit($request,$id);
    //  if($data){
    //     return redirect()->route('loaisp.index');
    //  }
    //  return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kq = DB::delete('delete from loaisanpham where id = ?', [$id]);
        return redirect()->route('loaisp.index');
    }
}
