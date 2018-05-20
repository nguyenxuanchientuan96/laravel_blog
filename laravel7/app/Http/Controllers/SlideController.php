<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    //danh sach
    public function danhsach(){
    	$slide= Slide::all();
    	return view('admin.slide.danhsach', ['slide'=>$slide]);

    }

    //them
    public function add(){
    	return view('admin.slide.them');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'Ten'=>'required',
    		'NoiDung'=>'required',
	    	]
	    	,
	    	[
	    	'Ten.required'=>'Ban chua nhap ten',
	    	'NoiDung.required'=>'Ban chua nhap Noi Dung'	
    		]);
    	$slide= new Slide;
    	$slide->Ten=$request->Ten;
    	$slide->NoiDung=$request->NoiDung;
    	if($request->has('link'))
    		$slide->link= $request->link;

    	if($request->hasFile('Hinh')){
        
            $file= $request->file('Hinh');
            // cho phep duoi
            $duoi= $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' ){
                return redirect('admin/slide/them')->with('loi','Ban chi duoc them anh cuo duoi jpg, png, jpeg');
            }

            // kiem tra xem hinh da ton tai chua
            // lay ten hinh ra
            $name= $file->getClientOriginalName();

            // random 4 ki tu truoc ten anh
              $hinh= str_random(4)."_".$name;
            
            while(file_exists("upload/slide/".$hinh)){
                $hinh= str_random(4)."_".$name;
            }
                
        
            $file->move("upload/slide", $hinh);
            $slide->Hinh= $hinh;   
        }
        else{
            $slide->Hinh="";
        }
        $slide->save();
        return redirect('admin/slide/add')->with('thongbao', 'Them Slide thanh cong');
        
    }

    // sua

    public function edit($id){
        $slide= Slide::find($id);
        return view('admin/slide/sua',compact('slide'));
    }

    public function update(Request $request, $id){
       $this->validate($request,[
            'Ten'=>'required',
            'NoiDung'=>'required',
            ]
            ,
            [
            'Ten.required'=>'Ban chua nhap ten',
            'NoiDung.required'=>'Ban chua nhap Noi Dung'    
            ]);
        $slide= Slide::find($id);
        $slide->Ten=$request->Ten;
        $slide->NoiDung=$request->NoiDung;
        if($request->has('link'))
            $slide->link= $request->link;

        if($request->hasFile('Hinh')){
        
            $file= $request->file('Hinh');
            // cho phep duoi
            $duoi= $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' ){
                return redirect('admin/slide/them')->with('loi','Ban chi duoc them anh cuo duoi jpg, png, jpeg');
            }

            // kiem tra xem hinh da ton tai chua
            // lay ten hinh ra
            $name= $file->getClientOriginalName();

            // random 4 ki tu truoc ten anh
              $hinh= str_random(4)."_".$name;
            
            while(file_exists("upload/slide/".$hinh)){
                $hinh= str_random(4)."_".$name;
            }
            unlink("upload/slide/". $slide->Hinh);
                
        
            $file->move("upload/slide", $hinh);
            $slide->Hinh= $hinh;   
        }
   
        $slide->save();
        return redirect('admin/slide/edit/'.$slide->id)->with('thongbao', 'Sua Slide thanh cong');

    }

    // xoa
    public function destroy($id){
        $slide=Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao', 'Xoa thanh cong');
    }
}
