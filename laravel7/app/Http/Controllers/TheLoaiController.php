<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //

    public function getDanhSach(){
    	$theloai= TheLoai::all();
    	return view('admin.theloai.danhsach', compact('theloai'));
    }
    // them
    public function getThem(){
    	return view('admin.theloai.them');
    }

    public function store(Request $request ){
    	$this->validate($request,
    		[
    			'Ten' => 'required|min:3|max:100'
    		],
    		[
    			'Ten.required' => 'Ban chua nhap ten the loai',
    			'Ten.min' => 'Do dai toi thieu tu 3 -> 100 ki tu',
    			'Ten.max' => 'Do dai toi thieu tu 3 -> 100 ki tu',
    		]
    		);
    	$theloai= new TheLoai;
    	$theloai->Ten=$request->Ten;
    	$theloai->TenKhongDau= changeTitle($request->Ten);
    	$theloai->save();

    	return redirect()->route('theloai.them')->with('thongbao','Them Thanh Cong');

    }

    // sua
    public function edit($id){
        $tloai = TheLoai::find($id);
        return view('admin.theloai.sua', compact('tloai'));
    }

    public function update(Request $request, $id){
        $tloai= TheLoai::find($id);
        $this->validate($request,
            [
                'Ten' => 'required|min:3|max:100'
            ],
            [
                'Ten.required' => 'Ban chua nhap ten the loai',
                'Ten.min' => 'Do dai toi thieu tu 3 -> 100 ki tu',
                'Ten.max' => 'Do dai toi thieu tu 3 -> 100 ki tu',
            ]
            );
        $theloai= new TheLoai;
        $tloai->update([
            'Ten' => $request->get('Ten'),
            'TenKhongDau'=>changeTiTle($request->get('Ten'))


            ]);
        
        return redirect()->route('theloai.danhsach')->with('thongbao','Sua Thanh Cong');
    }

    // xoa
    public function destroy($id){
        $tloai=TheLoai::find($id);
        $tloai->delete();
        return redirect()->route('theloai.danhsach')->with('thongbao','Xoa thanh cong');


    }
}
