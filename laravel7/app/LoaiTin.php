<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    //
    protected $table= 'loaitin';
    protected $fillable = [
    'idTheLoai',
    'Ten',
    'TenKhongDau'
    
    ];

    // muon biet loai tin thuoc the loai nao
    public function theloai(){
    	return $this->belongsTo('App\TheLoai', 'idTheLoai', 'id');

    }

    // trong loai tin muon biet co bao nhieu loai tin
    public function tintuc(){
    	return $this->hasMany('App\TinTuc', 'idTinTuc', 'id');
    }
}
