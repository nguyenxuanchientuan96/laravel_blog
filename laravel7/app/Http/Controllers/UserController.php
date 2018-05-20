<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function danhsach(){
    	$user= User::all();
    	return view('admin.user.danhsach', compact('user'));
    }

    public function add(){
    	return view('admin.user.them');
    }

    public function store(Request $request){
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
    		$user->quyen=$request->quyen;

    		$user->save();
    		  return redirect()->route('user.add')->with('thongbao','Them Thanh Cong');
    }

    public function edit($id){
    	$user= User::find($id);
    	return view('/admin/user/sua', compact('user'));
    }
    public function update(Request $request, $id){
    	$this->validate($request,
    		[
    			'name'=>'required|min:3|max:20',

    		
    		],
    		[
    			'name.required'=>'Ban chua nhap ten nguoi dung',
    			'name.min'=>'Ten toi thieu it nhat 3 ki tu',
    			'name.max'=>'Ten toi da 20 ki tu',
    		
    			
    		]);
    		$user= User::find($id);
    		$user->name=$request->name;
    		$user->quyen=$request->quyen;

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
    		   return redirect('admin/user/edit/'.$user->id)->with('thongbao', 'Sua thanh cong');
    }

    public function destroy($id){
    	$user= User::find($id);
    	$user->delete();
    	return redirect('admin/user/danhsach/')->with('thongbao', 'Xoa thanh cong');
    }

    // dangnhap

    public function login(){
    	return view('admin.login');
    }
    public function admin(Request $request ){
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
    		return redirect('admin/theloai/danhsach')->with('thongbao','Chuc mung ban dang nhap thanh cong');
    	}else{
    		return redirect('admin/login')->with('thongbao','Dang nhap khong thanh cong');
    	}
    }

    public function logout(){
    	Auth::logout();
    	return redirect('admin/login');
    }
}
