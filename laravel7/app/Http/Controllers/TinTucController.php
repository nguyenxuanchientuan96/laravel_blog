<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;
use App\Comment;

class TinTucController extends Controller
{
    //danh sach
    public function danhsach(){
    	$tintuc= TinTuc::orderBy('id','DESC')->get();
    	return view('admin.tintuc.danhsach',compact('tintuc'));
    }

    // them
    public function add(){
    	$theloai=TheLoai::all();
    	$loaitin=LoaiTin::all();
    	return view('admin.tintuc.them', ['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'LoaiTin' => 'required',
                // la duy nhat, trong bang tin tuc tro sang cot tieu de
                'TieuDe' => 'required|min:3|max:100|unique:tintuc',
                'TomTat'=>'required',
                'NoiDung'=>'required'
            ],
            [
                'LoaiTin.required' => 'Ban chua nhap loai tin',
                'TieuDe.min' => 'Do dai toi thieu tu 3 -> 100 ki tu',
                'TieuDe.max' => 'Do dai toi thieu tu 3 -> 100 ki tu',
                'TieuDe.unique'=>'Tieu De da ton tai',
                'TomTat.required'=> 'Ban Chua nhap tom tat',
                'NoiDung.required'=> 'Ban Chua nhap Noi Dung',

            ]
            );

        $tintuc= new TinTuc;
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau= changeTitle($request->TieuDe);
        $tintuc->idLoaiTin= $request->LoaiTin;
        $tintuc->TomTat= $request->TomTat;
        $tintuc->NoiDung= $request->NoiDung;
        $tintuc->SoLuotXem=0;
        if($request->hasFile('Hinh')){
        
            $file= $request->file('Hinh');
            // cho phep duoi
            $duoi= $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' ){
                return redirect()->route('tintuc.add')->with('loi','Ban chi duoc them anh cuo duoi jpg, png, jpeg');
            }

            // kiem tra xem hinh da ton tai chua
            // lay ten hinh ra
            $name= $file->getClientOriginalName();

            // random 4 ki tu truoc ten anh
              $hinh= str_random(4)."_".$name;
            
            while(file_exists("upload/tintuc/".$hinh)){
                $hinh= str_random(4)."_".$name;
            }
                
        
            $file->move("upload/tintuc", $hinh);
            $tintuc->Hinh= $hinh;   
        }
        else{
            $tintuc->Hinh="";
        }
        

        $tintuc->save();
        return redirect()->route('tintuc.add')->with('thongbao','Them Thanh Cong');
     }

     // sua
     public function edit($id){
        $tintuc= TinTuc::find($id);
        $theloai=TheLoai::all();
        $loaitin=LoaiTin::all();
    
        return view('admin.tintuc.sua', ['tintuc'=>$tintuc, 'theloai'=>$theloai, 'loaitin'=>$loaitin]);
     }

    public function update(Request $request, $id){
        $tintuc= TinTuc::find($id);
        $this->validate($request,
            [
                'LoaiTin' => 'required',
                // la duy nhat, trong bang tin tuc tro sang cot tieu de
                'TieuDe' => 'required|min:3|max:100|unique:tintuc',
                'TomTat'=>'required',
                'NoiDung'=>'required'
            ],
            [
                'LoaiTin.required' => 'Ban chua nhap loai tin',
                'TieuDe.min' => 'Do dai toi thieu tu 3 -> 100 ki tu',
                'TieuDe.max' => 'Do dai toi thieu tu 3 -> 100 ki tu',
                'TieuDe.unique'=>'Tieu De da ton tai',
                'TomTat.required'=> 'Ban Chua nhap tom tat',
                'NoiDung.required'=> 'Ban Chua nhap Noi Dung',

            ]
            );

        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau= changeTitle($request->TieuDe);
        $tintuc->idLoaiTin= $request->LoaiTin;
        $tintuc->TomTat= $request->TomTat;
        $tintuc->NoiDung= $request->NoiDung;

        if($request->hasFile('Hinh')){
        
            $file= $request->file('Hinh');
            // cho phep duoi
            $duoi= $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' && $duoi != 'JPG' ){
                return redirect()->route('tintuc.add')->with('loi','Ban chi duoc them anh cuo duoi jpg, png, jpeg');
            }

            // kiem tra xem hinh da ton tai chua
            // lay ten hinh ra
            $name= $file->getClientOriginalName();

            // random 4 ki tu truoc ten anh
              $hinh= str_random(4)."_".$name;
            
            while(file_exists("upload/tintuc/".$hinh)){
                $hinh= str_random(4)."_".$name;
            }
                // xoa file anh cu truoc khi luau moi
            unlink("upload/tintuc/".$tintuc->Hinh);
        
            $file->move("upload/tintuc", $hinh);
            $tintuc->Hinh= $hinh;   
        }
        
        

        $tintuc->save();
        return redirect('admin/tintuc/edit/'.$id)->with('thongbao','Sua Thanh Cong');


     }

     // xoa
      public function destroy($id){
        $tintuc=TinTuc::find($id);
        $tintuc->delete();
        return redirect()->route('tintuc.danhsach')->with('thongbao','Xoa thanh cong');


    }
}
