<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
	
Route::get('/', function (){
	return redirect('trangchu');
});

	// dang nhap
Route::get('/admin/login', 'UserController@login');
Route::post('/admin/login', 'UserController@admin');
Route::get('/admin/logout', 'UserController@logout');

	// quan ly admin
Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function (){


	// group loai tin
	Route::group(['prefix'=>'loaitin'], function (){
		// danh sach
		Route::get('danhsach',[
			'as' => 'loaitin.danhsach',
			'uses' => 'LoaiTinController@danhsach'
			]);

		// them
		Route::get('add',[
			'as' => 'loaitin.add',
			'uses'=>'LoaiTinController@add'
			]);

		Route::post('store',[
			'as'=>'loaitin.store',
			'uses'=>'LoaiTinController@store'
			]);

		// sua
		Route::get('edit/{id}',[
			'as' => 'loaitin.edit',
			'uses' => 'LoaiTinController@edit'
			]);

		Route::post('edit/{id}',[
			'as' => 'loaitin.update',
			'uses' =>'LoaiTinController@update'
			]);

		// xoa
		Route::get('/delete/{id}',[
			'as' => 'loaitin.destroy',
			'uses' =>'LoaiTinController@destroy'
			]);

	});


	// group comment
	Route::group(['prefix'=>'comment'], function (){
		// xoa
		Route::get('delete/{id}/{idTinTuc}',[
			'as' => 'comment.destroy',
			'uses'=>'CommentController@destroy'
			]);
	});



	// group slide
	Route::group(['prefix'=>'slide'], function (){
		Route::get('danhsach',[
		'as' => 'slide.danhsach',
		'uses'=>'SlideController@danhsach'
			]);


		// them

	Route::get('add',[
			'as' => 'slide.add',
			'uses'=>'SlideController@add'
			]);

		Route::post('store',[
			'as'=>'slide.store',
			'uses'=>'SlideController@store'
			]);
	// sua

	Route::get('/edit/{id}',[
		'as'=>'slide.edit',
		'uses' =>'SlideController@edit'
		]);

	Route::post('/edit/{id}',[
		'as' => 'slide.update',
		'uses'=>'SlideController@update'
		]);
		
	});

	// xoa
		Route::get('/delete/{id}',[
			'as' => 'slide.destroy',
			'uses' =>'SlideController@destroy'
			]);




	// group the loai
	Route::group(['prefix'=>'theloai'], function (){
		// danh sach
		Route::get('danhsach',[
			'as' => 'theloai.danhsach',
			'uses' => 'TheLoaiController@getDanhSach'
			]);
		// them
		Route::get('them',[
			'as' => 'theloai.them',
			'uses' => 'TheLoaiController@getThem'
			]);

		Route::post('store',[
			'as' => 'theloai.store',
			'uses' => 'TheLoaiController@store'
			]);

		// sua
		Route::get('sua/{id}',[
			'as' => 'theloai.edit',
			'uses' => 'TheLoaiController@edit'
			]);

		Route::post('sua/{id}',[
			'as' => 'theloai.update',
			'uses' =>'TheLoaiController@update'
			]);

		// xoa
		Route::get('/xoa/{id}',[
			'as' => 'theloai.destroy',
			'uses' =>'TheLoaiController@destroy'
			]);



	});

	// group tin tuc
	Route::group(['prefix'=>'tintuc'], function (){
		// danh sach
		Route::get('danhsach',[
			'as'=>'tintuc.danhsach',
			'uses'=>'TinTucController@danhsach'
			]);

		// them
		Route::get('add',[
			'as' => 'tintuc.add',
			'uses'=>'TinTucController@add'
			]);

		Route::post('store',[
			'as'=>'tintuc.store',
			'uses'=>'TinTucController@store'
			]);

		// sua
		Route::get('edit/{id}',[
			'as' => 'tintuc.edit',
			'uses' =>'TinTucController@edit'
			]);

		Route::post('edit/{id}',[
			'as'=>'tintuc.update',
			'uses'=>'TinTucController@update'
			]);

		// xoa
		Route::get('/xoa/{id}',[
			'as' => 'tintuc.destroy',
			'uses' =>'TinTucController@destroy'
			]);


		

	});

	// group user
	Route::group(['prefix'=>'user'], function (){
		
		// danhsach
		Route::get('danhsach',[
			'as'=>'user.danhsach',
			'uses'=>'UserController@danhsach'
			]);

		// them
		Route::get('add',[
			'as'=>'user.add',
			'uses'=>'UserController@add'
			]);

		Route::post('store',[
			'as'=>'user.store',
			'uses'=>'UserController@store'
			]);

		// sua
		Route::get('/edit/{id}',[
			'as'=>'user.edit',
			'uses'=>'UserController@edit'
			]);

		Route::post('edit/{id}',[
			'as'=>'user.update',
			'uses'=>'UserController@update'
			]);

		// xoa
		Route::get('xoa/{id}',[
			'as'=>'user.destroy',
			'uses'=>'UserController@destroy'
			]);
	});



	Route::group(['prefix'=>'ajax'], function (){
		Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
	});


});





// trang chu
Route::get('/trangchu', 'PageController@trangchu');

// lien he
Route::get('lienhe', 'PageController@lienhe');

// trang loaitin
Route::get('loaitin/{id}/{TenKhongDau}.html', 'PageController@loaitin');

// trang single
Route::get('tintuc/{id}/{TieuDeKhongDau}.html', 'PageController@tintuc');


// dangnhap
Route::get('dangnhap', 'PageController@getDangnhap');

Route::post('dangnhap', 'PageController@postDangnhap');

// dangxuat
Route::get('dangxuat', 'PageController@getDangxuat');

// commment
Route::post('comment/{id}', 'CommentController@comment');
// quanly nguoi dung
Route::get('nguoidung', 'PageController@getNguoiDung');
Route::post('nguoidung', 'PageController@postNguoiDung');

// dangki nguoi dung
Route::get('dangky', 'PageController@getDangKy');
Route::post('dangky', 'PageController@postDangky');

// timkiem
Route::post('timkiem', 'PageController@timkiem');