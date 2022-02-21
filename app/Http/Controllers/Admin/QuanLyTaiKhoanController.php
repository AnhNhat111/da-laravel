<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class QuanLyTaiKhoanController extends Controller
{
    protected $table = "taikhoan";
    protected $model;
    function __construct()
    {
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
				->select('*')->get();
        $getAdmin = DB::table('loaitaikhoan as ltk')
        ->rightJoin('admin as ad', 'ltk.id','ad.LOAITK_ID')
        ->select('*')->get();
        return view('admin.pages.quanlytaikhoan.index', [
            'tk'=> $getData,
            'ad'=>$getAdmin
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
        if($request->LOAITK_ID < 3){
            $data = $request->validate([
                "LOAITK_ID"=>'',
                "EMAIL" => 'required|string|unique:admin,EMAIL',
                "MATKHAU" =>  'required|string',
                "TENHIENTHI" => 'required|string',
                "SODIENTHOAI" => 'required|string|unique:admin,SODIENTHOAI',  
                "DIACHI" =>'required|string',
                "ANH" => '',
                "TRANGTHAI"=> '',
            ],
            [
                "LOAITK_ID.required"=>'Loại Tài Khoản khoản hkhông được bỏ trống',
                "EMAIL.required" => 'Tài khoản Email không được trùng',
                "SODIENTHOAI.required" => 'Số điện thoại đã tồn tại' 
            ]);
            $getImages = '';
            if($request->hasFile('ANH')){
                //Hàm kiểm tra dữ liệu
                $this->validate($request, 
                    [
                        //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                        'ANH' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    ],			
                    [
                        //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                        'ANH.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'ANH.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]
                );
                
                //Lưu hình ảnh vào thư mục public/upload/hinhthe
                $anh = $request->file('ANH');
                $getImages = time().'_'.$anh->getClientOriginalName();
                $destinationPath = public_path('upload/avatar');
                $anh->move($destinationPath, $getImages);
            }
           
            $create = admin::create([
                "LOAITK_ID" => $data['LOAITK_ID'],
                "email" => $data['EMAIL'],
                "password" => bcrypt($data['MATKHAU']),
                "TENHIENTHI" => $data['TENHIENTHI'],
                "SODIENTHOAI" => $data['SODIENTHOAI'], 
                "DIACHI" => $data['DIACHI'],    
                "ANH" => $getImages, 
                "TRANGTHAI" => $data['TRANGTHAI'] = 1,
            ]);
            
        }
        else{
          

            $data = $request->validate([
                "LOAITK_ID"=>'',
                "EMAIL" => 'required|string|unique:taikhoan,EMAIL',
                "MATKHAU" =>  'required|string',
                "TENHIENTHI" => 'required|string',
                "SODIENTHOAI" => 'required|string|unique:taikhoan,SODIENTHOAI',   
                "DIACHI" => 'required|string|',     
                "ANH" =>'',
                "TRANGTHAI"=> '',
            ],
            [
                "LOAITK_ID.required"=>'Loại Tài Khoản khoản hkhông được bỏ trống',
                "EMAIL.required" => 'Tài khoản Email không được trùng',
                "SODIENTHOAI.required" => 'Số điện thoại đã tồn tại' 
            ]);
            $getImages = '';
            if($request->hasFile('ANH')){
                //Hàm kiểm tra dữ liệu
                $this->validate($request, 
                    [
                        //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                        'ANH' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    ],			
                    [
                        //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                        'ANH.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'ANH.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]
                );
                
                //Lưu hình ảnh vào thư mục public/upload/hinhthe
                $anh = $request->file('ANH');
                $getImages = time().'_'.$anh->getClientOriginalName();
                $destinationPath = public_path('upload/avatar');
                $anh->move($destinationPath, $getImages);
            }
            $create = $this->model::create([
                "LOAITK_ID" => $data['LOAITK_ID'],
                "email" => $data['EMAIL'],
                "password" => bcrypt($data['MATKHAU']),
                "TENHIENTHI" => $data['TENHIENTHI'],
                "SODIENTHOAI" => $data['SODIENTHOAI'],    
                "DIACHI" => $data['DIACHI'], 
                "ANH" => $getImages,  
                "TRANGTHAI" => $data['TRANGTHAI'] = 1,
            ]);
        }

       
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
        $tk = DB::table('taikhoan')->select('*')->where('id',$id)->get();
        if(count($tk) < 1)
        {
            $tk = DB::table('admin')->select('*')->where('id',$id)->get();
         }
        // $ad = DB::table('admin')->select('*')->where('id',$id)->get();
        

        return view('admin.pages.quanlytaikhoan.edit', [
            'loaitk' => $loaitk, 
            'tk' => $tk,
            // 'ad' => $ad
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
        if($request->TENLOAITAIKHOAN > 2){
            $loaitk = $this->model::find($id);
            if (!$loaitk) {
                return back()->withInput();
            }
            $loaitk->LOAITK_ID = $request->TENLOAITAIKHOAN;
            $loaitk->email = $request->email;
            $loaitk->TENHIENTHI = $request->TENHIENTHI;
            $loaitk->SODIENTHOAI = $request->SODIENTHOAI;
            $loaitk->DIACHI = $request->DIACHI;
            $loaitk->TRANGTHAI = $request->TRANGTHAI ? 1 : 0;

            if($request->hasFile('ANH')){
                $this->validate($request, 
                    [
                        'ANH' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    ],			
                    [
                        'ANH.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'ANH.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]
                );
                
                //Xóa file hình thẻ cũ
                $getImages = DB::table('admin')->select('ANH')->where('id',$id)->get();
                if($getImages[0]->ANH != '' && file_exists(public_path('upload/avatar/'.$getImages[0]->ANH)))
                {  
                    unlink(public_path('upload/avatar/'.$getImages[0]->ANH));
                }
                
                //Lưu file hình thẻ mới
                $anh = $request->file('ANH');
                $getImage = time().'_'.$anh->getClientOriginalName();
                $destinationPath = public_path('upload/avatar');
                $anh->move($destinationPath, $getImage);
                $updateImages = DB::table('admin')->where('id', $id)->update([
                    'ANH' => $getImage
                ]);
            }
        }else{
            $loaitk = admin::find($id);
            if (!$loaitk) {
                return back()->withInput();
            }
            $loaitk->LOAITK_ID = $request->TENLOAITAIKHOAN;
            $loaitk->email = $request->email;
            $loaitk->TENHIENTHI = $request->TENHIENTHI;
            $loaitk->SODIENTHOAI = $request->SODIENTHOAI;
            $loaitk->DIACHI = $request->DIACHI;
            $loaitk->TRANGTHAI = $request->TRANGTHAI ? 1 : 0;
            if($request->hasFile('ANH')){
                $this->validate($request, 
                    [
                        'ANH' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    ],			
                    [
                        'ANH.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'ANH.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]
                );
                
                //Xóa file hình thẻ cũ
                $getImages = DB::table('admin')->select('ANH')->where('id',$id)->get();
                if($getImages[0]->ANH != '' && file_exists(public_path('upload/avatar/'.$getImages[0]->ANH)))
                {  
                    unlink(public_path('upload/avatar/'.$getImages[0]->ANH));
                }
                
                //Lưu file hình thẻ mới
                $anh = $request->file('ANH');
                $getImage = time().'_'.$anh->getClientOriginalName();
                $destinationPath = public_path('upload/avatar');
                $anh->move($destinationPath, $getImage);
                $updateImages = DB::table('admin')->where('id', $id)->update([
                    'ANH' => $getImage
                ]);
            }
           
        }
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
        $kq = DB::delete('delete from admin where id > 1 && id = ?', [$id]);
        return redirect()->route('quan-ly-tai-khoan.index');
    }
}
