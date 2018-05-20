<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //user login
    // function __construct(){
    // 	// neu dang dang nhap
    // 	$this->Dangnhap();
    // }

    // function Dangnhap(){
    // 	// neu dang check->dang dang nhap
    // 	if(Auth::check()){
    // 		view()->share('test',Auth::user());
    // 	}

    // }
}
