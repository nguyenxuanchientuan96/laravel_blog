<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Comment;
use App\TinTuc;

class CommentController extends Controller
{
    //

    public function destroy($id, $idTinTuc){
    	$comment = Comment::find($id);
    	$comment->delete();
    	return redirect('admin/tintuc/edit/'.$idTinTuc)->with('thongbao','Xoa comment thanh cong');

    }

    public function comment($id, Request $request){
    	$idTinTuc= $id;
    	$TinTuc= TinTuc::find($id);
    	$comment= new Comment;
    	$comment->idTinTuc = $idTinTuc;
    	$comment->idUser= Auth::user()->id;
    	$comment->NoiDung= $request->NoiDung;
    	$comment->save();

    	return redirect('tintuc/'.$idTinTuc.'/'.$TinTuc->TieuDeKhongDau.".html");

    

    }
}
