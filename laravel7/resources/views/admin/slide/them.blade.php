@extends('admin.layout.index')
@section('title_page', 'Them Slide')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Slide
                            <small>Them Slide</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}} <br>


                            @endforeach
                        </div>

                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                         {{session('thongbao')}}
                        </div>

                    @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                        {{-- <form action="{{route('theloai.store')}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Ten The loai</label>
                                <input class="form-control" name="Ten" placeholder="Nhap ten the loai" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Category Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form> --}}
                        {!! Form::open(array(
                             'route' => ['slide.store'],
                             'method' => 'POST', 
                             'enctype'=>'multipart/form-data',
                             
                        ))
                        !!}
                              
                                <div class="form-group">
                                   
                                    {!!Form::label('Ten', 'Ten')!!}
                                    {!!Form::text('Ten', null, array('id'=>'Ten', 'name'=>'Ten', 'placeholder'=>'Moi ban nhap Ten Slide') )!!}
                                </div>
                                
                              
                                <div class="form-group">
                                  {!!Form::label('NoiDung', 'Noi Dung')!!}
                                    {!!Form::textarea('NoiDung', null, array('id'=>'demo', 'name'=>'NoiDung', 'placeholder'=>'Moi ban nhap NoiDung', 'class'=> 'form-control ckeditor') )!!}
                                </div>

                                <div class="form-group">
                                  {!!Form::label('Link', 'Link')!!}
                                    {!!Form::text('Link', null, array('id'=>'link', 'name'=>'link', 'placeholder'=>'Moi ban nhap link') )!!}
                                </div>

                                <div class="form-group">
                                  {!!Form::label('Hinh', 'Hinh Anh')!!}
                                    {!!Form::file('Hinh', null, array('id'=>'Hinh', 'name'=>'Hinh') )!!}
                                </div>

                    

                                {!!Form::submit('Them Slide', array('class'=>'btn btn-success'))!!}
                                
                                <button type="reset" class="btn btn-default">Reset</button>
                        {!!Form::close() !!}    
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection

