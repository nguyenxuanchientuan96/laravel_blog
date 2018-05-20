<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    //
    protected $table= 'tintuc';
    protected $fillable = [
    'TieuDe',
    'TieuDeKhongDau',
    'TomTat',
    'NoiDung',
    'Hinh',
    'NoiBat',
    'SoLuotXem',
    'idLoaiTin'
    ];

    // lien ket sang loai tin
    public function loaitin(){
    	// 1 tin tuc thuoc 1 loai tin
    	return $this->belongsTo('App\LoaiTin', 'idLoaiTin', 'id');
    }

    // muon biet trong tin tuc co baonhieu comment
    // 1 tin tuc co nhieu comment
    public function comment(){
    	return $this->hasMany('App\Comment', 'idTinTuc', 'id');
    }
}
