@extends('admin.layout.index')
@section('title_page', 'Sua the loai')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">The Loai
                            <small>Sua The Loai:  {{$tloai->Ten}}</small>
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
                        <form action="{{route('theloai.update',$tloai->id)}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Ten The loai</label>
                                <input class="form-control" name="Ten" placeholder="Nhap ten the loai" value="{{$tloai->Ten}}" />
                            </div>
                            
                            <button type="submit" class="btn btn-success">Edit The Loai</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                        



                        {{-- <p style="color: red">Mời bạn nhập tên thể loại mới</p>
                        {!! Form::open(array(
                             'route' => ['theloai.update',$tloai->id],
                             'method' => 'PUT', 
                             
                        ))
                        !!}
                
                               <div class="form-group">
                                    {!!Form::label('Ten', 'Ten The Loai')!!}
                                    {!!Form::text('Ten', null, array('id'=>'Ten', 'name'=>'Ten', 'placeholder'=>'Moi ban nhap ten the loai') )!!}
                                </div>

                                {!!Form::submit('Sua The Loai', array('class'=>'btn btn-success'))!!}
                                
                                <button type="reset" class="btn btn-default">Reset</button>



                        {!!Form::close() !!}     --}}
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection