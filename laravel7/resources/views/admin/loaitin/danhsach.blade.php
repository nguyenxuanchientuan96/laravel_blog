@extends('admin.layout.index')
@section('title_page', 'Danh sach loai tin')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
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

                        <h1 class="page-header">The Loai
                            <small>List The Loai</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                              
                                <th>Ten</th>
                                <th>Ten Khong Dau</th>
                                <th>The Loai</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($loaitin as $lt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$lt->id}}</td>
                                
                                <td>{{$lt->Ten}}</td>
                                <td>{{$lt->TenKhongDau}}</td>
                                <td>{{$lt->theloai->Ten}}</td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i> <a href="{{route('loaitin.destroy',$lt->id)}}">Delete</a> </td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('loaitin.edit', $lt->id)}}">Edit</a></td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection