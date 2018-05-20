<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table= 'theloai';
    protected $fillable = [
    'Ten',
    'TenKhongDau'
    
    ];

    // function lay ra tats ca loai tin cua the loai nay
    public function loaitin(){
    	// mot the loai co nhieu loai tin
    	return $this->hasMany('App\LoaiTin','idTheLoai','id');
    }


    // trong the loai co ban nhieu tin tuc, muon lay het tin tuc ra
    public function tintuc(){
    	return $this->hasManyThrough('App\TinTuc', 'App\LoaiTin', 'idTheLoai', 'idLoaiTin', 'id');
    }
}
