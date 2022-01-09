<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\loaitaikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoaiTaiKhoanController extends Controller
{
    protected $table = "loaitaikhoan";
    protected $model;
    function __construct()
    {
        $this->model = new loaitaikhoan();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->get();
        return view('admin.pages.QLloaitaikhoan', [
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
        return view('admin.pages.loaitaikhoan.create');
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
            "TENlOAITAIKHOAN" => $request->TENlOAITAIKHOAN
        ];
        $tk = $this->model::create($data);
        if ($tk->save()) {
            return redirect()->route('loaitaikhoan.index');
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
        return view('admin.pages.loaitaikhoan.edit', [
            'id' => $id,
            'data' => $data
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
        $loaitk->TENLOAITAIKHOAN = $request->TENLOAITAIKHOAN;
        if ($loaitk->save()) {
            return redirect()->route('loaitaikhoan.index');
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
        $kq = DB::delete('delete from loaitaikhoan where Id = ?', [$id]);
        return redirect()->route('loaitaikhoan.index');
    }
}
