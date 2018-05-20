@extends('admin.layout.index')
@section('title_page', 'Them tin tuc')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Tin Tuc
                            <small>Them Tin Tuc</small>
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
                             'route' => ['tintuc.store'],
                             'method' => 'POST', 
                             'enctype'=>'multipart/form-data',
                             
                        ))
                        !!}
                                <div class="form-group">
                                    <label>The loai</label>
                                    <select class="form-control" name="TheLoai" id="TheLoai">
                                         @foreach($theloai as $tl)
                                            <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                         @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Loai Tin</label>
                                    <select class="form-control" name="LoaiTin" id="LoaiTin">
                                         @foreach($loaitin as $lt)
                                            <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                         @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                  {!!Form::label('TieuDe', 'Tieu De')!!}
                                    {!!Form::text('TieuDe', null, array('id'=>'TieuDe', 'name'=>'TieuDe', 'placeholder'=>'Moi ban nhap Tieu De') )!!}
                                </div>

                                <div class="form-group">
                                  {!!Form::label('TomTat', 'Tom Tat')!!}
                                    {!!Form::textarea('TomTat', null, array('id'=>'demo', 'name'=>'TomTat', 'placeholder'=>'Moi ban nhap Tom Tat', 'class'=> 'form-control ckeditor') )!!}
                                </div>

                                <div class="form-group">
                                  {!!Form::label('NoiDung', 'Noi Dung')!!}
                                    {!!Form::textarea('NoiDung', null, array('id'=>'demo', 'name'=>'NoiDung', 'placeholder'=>'Moi ban nhap NoiDung', 'class'=> 'form-control ckeditor') )!!}
                                </div>

                                <div class="form-group">
                                  {!!Form::label('Hinh', 'Hinh Anh')!!}
                                    {!!Form::file('Hinh', null, array('id'=>'Hinh', 'name'=>'Hinh') )!!}
                                </div>

                                <div class="form-group">
                                    <label> Noi Bat</label>
                                    <label class="radio-inline"> 
                                        <input type="radio" name="NoiBat" value="0" checked=""> Khong
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="NoiBat" value="1" checked=""> Co
                                    </label>
                                </div> 



                                {!!Form::submit('Them Tin Tuc', array('class'=>'btn btn-success'))!!}
                                
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

@section('script')
    <script>
        $(document).ready(function(){
            $("#TheLoai").change(function(){
                var idTheLoai= $(this).val();
                $.get('admin/ajax/loaitin/'+ idTheLoai, function(data){
                     $("#LoaiTin").html(data);
                });
            });
        });
    </script>
@endsection
