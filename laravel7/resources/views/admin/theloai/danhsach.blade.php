@extends('admin.layout.index')
@section('title_page', 'Danh sach the loai')
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
                                <th>Name</th>
                                <th>Ten Khong Dau</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($theloai as $tl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tl->id}}</td>
                                <td>{{$tl->Ten}}</td>
                                <td>{{$tl->TenKhongDau}}</td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i> <a href="{{route('theloai.destroy',$tl->id)}}">Delete</a> </td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('theloai.edit', $tl->id)}}">Edit</a></td>
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