<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\giohang;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GioHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $model;

    public function __construct()
    {
        $this->model = new giohang();
    }
    public function index()
    {
        $id = Auth::guard('user')->id();
        $data = $this->model->getDataId($id);
        return view('user.pages.cart')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::guard('user')->id();
        $sp = new sanpham();
        $dataSp = $sp->danhsachsp1($request->SANPHAM_ID);
        $data = $this->model->getDuplicateId($id, $dataSp->id);
        if ($data) {
            $this->model->editQuantity($data[0]);
            return redirect()->route('user.giohang');
        }
        $result = [
            'TAIKHOAN_ID' => $id,
            'SANPHAM_ID' => $dataSp->id,
            'SOLUONG' => 1,
            'TONGTIEN' => $dataSp->GIABAN
        ];
        $this->model->addToCart($result);

        return redirect()->route('user.giohang');
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
