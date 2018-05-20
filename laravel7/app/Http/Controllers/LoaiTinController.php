<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
class LoaiTinController extends Controller
{
    //danh sach


    public function danhsach(){
    	$loaitin=LoaiTin::all();
    	return view('admin.loaitin.danhsach', compact('loaitin'));
    }

    // them
    public function add(){
    	$theloai=TheLoai::all();
    	return view('admin.loaitin.them', compact('theloai'));
    }

    public function store(Request $request ){
    	$this->validate($request,
    		[
    			'Ten' => 'required|min:3|max:100',
    			'TheLoai'=>'required',
    		],
    		[
    			'Ten.required' => 'Ban chua nhap ten the loai',
    			'TheLoai.required'=>'Ban chua chon ten the loai',
    			'Ten.min' => 'Do dai toi thieu tu 3 -> 100 ki tu',
    			'Ten.max' => 'Do dai toi thieu tu 3 -> 100 ki tu',
    		]
    		);
    	$loaitin= new LoaiTin;
    	$loaitin->idTheLoai=$request->TheLoai;
    	$loaitin->Ten=$request->Ten;
    	$loaitin->TenKhongDau= changeTitle($request->Ten);
    	$loaitin->save();

    	return redirect()->route('loaitin.add')->with('thongbao','Them Thanh Cong');

    }

    // sua
    public function edit($id){
        $ltin = LoaiTin::find($id);
        $theloai= TheLoai::all();
        return view('admin.loaitin.sua', ['ltin'=>$ltin, 'theloai'=>$theloai]);
    }

    public function update(Request $request, $id){
        $ltin= LoaiTin::find($id);
        $this->validate($request,
            [
                'Ten' => 'required|min:3|max:100',
                'TheLoai'=> 'required',
            ],
            [
                'Ten.required' => 'Ban chua nhap ten the loai',
                'TheLoai.required'=>'Ban chua chon ten the loai',
                'Ten.min' => 'Do dai toi thieu tu 3 -> 100 ki tu',
                'Ten.max' => 'Do dai toi thieu tu 3 -> 100 ki tu',
            ]
            );
        $loaitin= new LoaiTin;
        $ltin->update([
            'Ten' => $request->get('Ten'),
            'TenKhongDau'=>changeTiTle($request->get('Ten'))
            ]);
        
        return redirect()->route('loaitin.danhsach')->with('thongbao','Sua Thanh Cong');
    }


    // xoa
    public function destroy($id){
        $tloai=LoaiTin::find($id);
        $tloai->delete();
        return redirect()->route('loaitin.danhsach')->with('thongbao','Xoa thanh cong');


    }

}
