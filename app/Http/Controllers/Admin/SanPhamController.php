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
            "MASP" => 'required|string|unique:sanpham,MASP',
            "TRANGTHAI"=>'',
            "HINHANH" => '',
            "MOTA" => 'required|string',
            "GIABAN" => 'required',    
        ]); 
        $getImages = '';
            if($request->hasFile('HINHANH')){
                //Hàm kiểm tra dữ liệu
                $this->validate($request, 
                    [
                        //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                        'HINHANH' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    ],			
                    [
                        //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                        'HINHANH.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'HINHANH.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]
                );
                
                //Lưu hình ảnh vào thư mục public/upload/hinhthe
                $anh = $request->file('HINHANH');
                $getImages = time().'_'.$anh->getClientOriginalName();
                $destinationPath = public_path('assets/user/img/product');
                $anh->move($destinationPath, $getImages);
            }
        $create = $this->model::create([
            "LOAISP_ID" => $data['LOAISP_ID'],    
            "TENSP"=> $data['TENSP'],
            "MASP"=> $data['MASP'],
            "TRANGTHAI"=>$data['TRANGTHAI'] = 1,
            "HINHANH" => $getImages,
            "MOTA" => $data['MOTA'],
            "GIABAN" => $data['GIABAN'],    
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

       $sp->MOTA = $request->MOTA;
       
       $sp->GIABAN = $request->GIABAN;
       
       if($request->hasFile('HINHANH')){
        $this->validate($request, 
            [
                'HINHANH' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ],			
            [
                'HINHANH.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'HINHANH.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            ]
        );
        
        //Xóa file hình thẻ cũ
        $getImages = DB::table('sanpham')->select('HINHANH')->where('id',$id)->get();
        if($getImages[0]->HINHANH != '' && file_exists(public_path('assets/user/img/product/'.$getImages[0]->HINHANH)))
        {  
            unlink(public_path('assets/user/img/product/'.$getImages[0]->HINHANH));
        }
        
        //Lưu file hình thẻ mới
        $anh = $request->file('HINHANH');
        $getImage = time().'_'.$anh->getClientOriginalName();
        $destinationPath = public_path('assets/user/img/product');
        $anh->move($destinationPath, $getImage);
        $updateImages = DB::table('sanpham')->where('id', $id)->update([
            'HINHANH' => $getImage
        ]);
    }

       
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
        
        return redirect()->route('QLsanpham.index');
    }
}
