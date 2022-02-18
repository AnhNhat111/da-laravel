<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SigUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $table = "taikhoan";
    protected $model;
    function __construct()
    {
        $this->model = new taikhoan();
    }

    public function index()
    {
        return view('user.pages.login.index');
    }
    public function showSigupForm()
    {
        return view('user.pages.signup.signup');
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
    public function signup(Request $request)
    {
      
        $data = $request->validate([   
            "email" => 'required|string|unique:taikhoan,email',
            "password" =>  'required|string',
            "TENHIENTHI" => 'required|string',
            "SODIENTHOAI" =>'required|string',  
        ]);

      
        $create = $this->model::create([
            "LOAITK_ID" => 3,
            "email" => $data['email'],
            "password" => bcrypt($data['password']),
            "TENHIENTHI" => $data['TENHIENTHI'],
            "SODIENTHOAI" => $data['SODIENTHOAI'],    
            "DIACHI" =>'', 
            "ANH" =>'', 
            "TRANGTHAI" => 1,
        ]);
       
        if ($create->save()) {
            return  redirect()->route('user.login');
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
        //
    }
}
