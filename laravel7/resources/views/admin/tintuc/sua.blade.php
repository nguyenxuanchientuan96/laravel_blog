@extends('admin.layout.index')
@section('title_page', 'Sua tin tuc')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Tin Tuc
                            <small>Sua Tin Tuc: 
                            <br>    
                            {{$tintuc->TieuDe}}
                            </small>
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
                             'route' => ['tintuc.update', $tintuc->id],
                             'method' => 'POST', 
                             'enctype'=>'multipart/form-data',
                             
                        ))
                        !!}
                                <div class="form-group">
                                    <label>The loai</label>
                                    <select class="form-control" name="TheLoai" id="TheLoai">
                                         @foreach($theloai as $tl)
                                            <option 
                                                
                                                {{-- xem tin tuc nam trong option nao --}}
                                                @if($tintuc->loaitin->theloai->id == $tl->id)
                                                {{"selected"}}
                                                @endif

                                            value="{{$tl->id}}">{{$tl->Ten}}</option>
                                         @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Loai Tin</label>
                                    <select class="form-control" name="LoaiTin" id="LoaiTin">
                                         @foreach($loaitin as $lt)
                                            <option 
                                            {{-- xem tin tuc nam trong option nao --}}
                                                @if($tintuc->loaitin->id == $lt->id)
                                                {{"selected"}}
                                                @endif

                                            value="{{$lt->id}}">{{$lt->Ten}}</option>
                                         @endforeach
                                    </select>
                                </div>
                                
                                {{-- <div class="form-group">
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
                                </div> --}}

                                <div class="form-group">
                                    <label>Tieu De</label>
                                    <input class="form-control" name="TieuDe" id="TieuDe" value="{{$tintuc->TieuDe}}" />
                                </div>

                                <div class="form-group">
                                    <label> Tom Tat</label>
                                    <input class="form-control" name="TomTat" id="TomTat" value="{{$tintuc->TomTat}}" />
                                </div>

                                <div class="form-group">
                                    <label>Noi Dung</label>
                                    <input class="form-control" name="NoiDung" id="NoiDung" value="{{$tintuc->NoiDung}}" />
                                </div>

                                <div class="form-group">
                                    <label>Hinh Anh</label>
                                    <p> 
                                    <img width="100px" height="100px" src="upload/tintuc/{{$tintuc->Hinh}}">
                                    </p>
                                    <input class="form-control" type="file" name="Hinh" id="Hinh" />
                                </div>

                                

                                <div class="form-group">
                                    <label> Noi Bat</label>
                                    <label class="radio-inline"> 
                                        <input type="radio" name="NoiBat" value="0"
                                            @if($tintuc->NoiBat==0)
                                            {{"checked"}}
                                            @endif
                                         > Khong
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="NoiBat" value="1" 
                                        @if($tintuc->NoiBat==1)
                                            {{"checked"}}
                                            @endif
                                        > Co
                                    </label>
                                </div> 



                                {!!Form::submit('Sua Tin Tuc', array('class'=>'btn btn-success'))!!}
                                
                                <button type="reset" class="btn btn-default">Reset</button>
                        {!!Form::close() !!}    
                    </div>
                </div>
                <!-- /.row -->

                {{-- danh sach comment --}}
                <div class="row">
                    <div class="col-lg-12">
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

                        <h1 class="page-header">Tin Tuc
                            <small>List Comment</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Nguoi Dung</th>
                                <th>Noi Dung</th>
                                <th>Ngay Dang</th>
                              
                                <th>Delete</th>
         
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tintuc->comment as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td>
                                    {{$cm->user->name}} </td>
                                <td>{{$cm->NoiDung}}</td>
                                <td>{{$cm->created_at}}</td>
                              
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i> <a href="admin/comment/delete/{{$cm->id}}/{{$tintuc->id}}">Delete</a> </td>
                                
                              
                            </tr>

                        @endforeach
                        </tbody>

                    </table>
                </div>


        {{-- end- danh sach comment --}}

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
