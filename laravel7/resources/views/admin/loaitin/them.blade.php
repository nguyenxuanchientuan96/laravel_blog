@extends('admin.layout.index')
@section('title_page', 'Them loai tin')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loai Tin
                            <small>Them Loai Tin</small>
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
                             'route' => ['loaitin.store'],
                             'method' => 'POST', 
                             
                        ))
                        !!}
                                <div class="form-group">
                                    <label>The loai</label>
                                    <select class="form-control" name="TheLoai">
                                         @foreach($theloai as $tl)
                                            <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                         @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                  {!!Form::label('Ten', 'Ten The Loai')!!}
                                    {!!Form::text('Ten', null, array('id'=>'Ten', 'name'=>'Ten', 'placeholder'=>'Moi ban nhap ten loai tin') )!!}
                                </div>

                                {!!Form::submit('Them Loai Tin', array('class'=>'btn btn-success'))!!}
                                
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