<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table= 'comment';
    protected $fillable = [
     'idUser',
     'idTinTuc',
     'NoiDung',
     ];

     // muon biet cooment thuoc tin tuc nao
     public function tintuc(){
     	return $this->belongsTo('App\TinTuc', 'idTinTuc', 'id');
     }

     // muon biet comment nay thuoc user nao
     // 1 comment thuoc 1 user
     public function user(){
     	return $this->belongsTo('App\User', 'idUser', 'id');
     }

}
