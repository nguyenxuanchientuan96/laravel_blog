<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\User;
class PageController extends Controller
{	
	// menu
    //view share: tat ca cac view deu co bien $theloai
	public function __construct(){
		$theloai= TheLoai::all();
		$slide= Slide::all();
		view()->share('theloai', $theloai);
		view()->share('slide', $slide);



	}

	public function trangchu(){
    	
    	return view ('pages/trangchu' );
    }

    public function lienhe(){
    	
    	return view('pages/lienhe');
    }


    // loaitin

    public function loaitin($id){
        $loaitin= LoaiTin::find($id);
        // tim tat ca nhung tim tuc nao co idLoaiTin = id nhan ve
        $tintuc= TinTuc::where('idLoaiTin', $id)->paginate(5);
        return view('pages/loaitin',['loaitin'=>$loaitin, 'tintuc'=> $tintuc]);
    }


    // tintuc trang single
    public function tintuc($id){
        $tintuc= TinTuc::find($id);
        $tinnoibat= TinTuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan= TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(4)->get();
        return view ('pages/tintuc', ['tintuc'=>$tintuc, 'tinnoibat'=>$tinnoibat, 'tinlienquan'=>$tinlienquan]);

    }

    // dangnhap
   public function getDangnhap(){
        
        return view('pages/dangnhap');
    }

    public function postDangnhap(Request $request){
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required|min:3'
            ],
            [
                'email.required'=>'Ban chua nhap email',
                'password.required'=>'Ban chua nhap password',
                'password.min'=>'Password toi thieu 3 ki tu'
            ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('trangchu');
        }else{
            return redirect('dangnhap')->with('thongbao','Dang nhap khong thanh cong');
        }
    }

    // dang xuat
    public function getDangxuat(){
        Auth::logout();
        return redirect('trangchu');
    }

    // ql nguoi dung
    public function getNguoiDung(){
        $nguoidung= Auth::user();
        return view('pages.nguoidung', ['nguoidung'=>$nguoidung]);
    }

    public function postNguoiDung(Request $request){
        $this->validate($request,
            [
                'name'=>'required|min:3|max:20',

            
            ],
            [
                'name.required'=>'Ban chua nhap ten nguoi dung',
                'name.min'=>'Ten toi thieu it nhat 3 ki tu',
                'name.max'=>'Ten toi da 20 ki tu',
            
                
            ]);
            // nguoi dung dang dang nhap r nen dung Auth
            $user= Auth::user();
            $user->name=$request->name;


            // neu ngta checkbox -> gia tri on
            if($request->changepassword=='on'){
                $this->validate($request,
            [
            
                'password'=>'required|min:3|max:30',
                'passwordAgain'=>'required|same:password'
            ],
            [
            
                'password.required'=>'Ban chua nhap mat khau',
                'password.min'=>'Mat khau nhap toi thieu 3 ki tu',
                'password.max'=>'Mat khau toi da 30 ki tu',
                'passwordAgain.required'=>'ban chua nhap Repassword',
                'passwordAgain.same'=>'Mat khau Repassword khong trung'
            ]);
                $user->password=bcrypt($request->password);
            }
            
            $user->save();
               return redirect('nguoidung')->with('thongbao', 'Sua thanh cong');

    }

    // dang ky
    public function getDangKy(){
        return view('pages.dangky');
    }

    public function postDangKy(Request $request){
            $this->validate($request,
            [
                'name'=>'required|min:3|max:20',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:3|max:30',
                'passwordAgain'=>'required|same:password'
            ],
            [
                'name.required'=>'Ban chua nhap ten nguoi dung',
                'name.min'=>'Ten toi thieu it nhat 3 ki tssu',
                'name.max'=>'Ten toi da 20 ki tu',
                'email.required'=>'Ban chua nhap email',
                'email.email'=>'Ban chua nhap dung dinh dang Email',
                'email.unique'=>'email da ton tai',
                'password.required'=>'Ban chua nhap mat khau',
                'password.min'=>'Mat khau nhap toi thieu 3 ki tu',
                'password.max'=>'Mat khau toi da 30 ki tu',
                'passwordAgain.required'=>'ban chua nhap Repassword',
                'passwordAgain.same'=>'Mat khau Repassword khong trung'
            ]);
            $user= new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->quyen=0; 
            $user->save();
              return redirect('dangky')->with('thongbao','Ban Da Dang Ky Thanh Cong');
    }

    public function timkiem(Request $request){
        $tukhoa= $request->tukhoa;
        $tintuc= TinTuc::where('TieuDe', 'like', "%$tukhoa%")->orwhere('TomTat', 'like', "%$tukhoa%")->orwhere('NoiDung', 'like', "%$tukhoa%")->take(20)->paginate(5);
        return view('pages.timkiem', ['tintuc'=>$tintuc, 'tukhoa'=>$tukhoa]);
    }



}
