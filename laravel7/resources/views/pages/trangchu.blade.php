@extends('layout.index')
@section('title', 'Trang Chu')
@section('content')

<!-- Page Content -->
    <div class="container">
    {{-- slide --}}
    	@include('layout/slide')
    {{-- endslide --}}
        
        <div class="space20"></div>


        <div class="row main-left">
    {{-- menu --}}
          	@include('layout/menu')
    {{-- end-menu --}}
            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
	            	</div>

	            	<div class="panel-body">
	            		@foreach($theloai as $tl)
	            		{{-- neu the loai k co gi ben trong -> k in --}}
	            			@if(count($tl->loaitin)>0)
		            		<!-- item -->
						    <div class="row-item row">
			                	<h3>
			                		<a href="category.html">{{$tl->Ten}}</a> | 	
			                		{{-- loaitin --}}
			                		@foreach($tl->loaitin as $lt)
			                			<small><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><i>{{$lt->Ten}}</i></a>/</small>
			                		@endforeach
			                	</h3>

			                	<?php
			                		// noi bat =1, sap xep theo ngay, lay ra 5 cai
			                		$data= $tl->tintuc->where('NoiBat',1)->sortByDESC('created_at')->take(5);
			                		// trong ds 5 tin, lay ra 1 tin-> con 4 tin
			                		// shift tra ve dl kieu mang
			                		$tin1= $data->shift();

			                	?>
			                	<div class="col-md-8 border-right">
			                		<div class="col-md-5">
				                        <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
				                            <img class="img-responsive" src="upload/tintuc/{{$tin1->Hinh}}" alt="">
				                        </a>
				                    </div>

				                    <div class="col-md-7">
				                        <h3>{{$tin1->TieuDe}}</h3>
				                        <p>{{$tin1->TomTat}}</p>
				                        <a class="btn btn-primary" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">See more <span class="glyphicon glyphicon-chevron-right"></span></a>
									</div>

			                	</div>
			                    


			                	{{-- 4 tin con lai --}}
								<div class="col-md-4">
									@foreach($data->all() as $tintuc)
									<a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
										<h4>
											<span class="glyphicon glyphicon-list-alt"></span>
											{{$tintuc['TieuDe']}}
										</h4>
									</a>
									@endforeach

								</div>
								
								<div class="break"></div>
			                </div>
			                <!-- end item -->
			                @endif
		                @endforeach
		               

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

@endsection