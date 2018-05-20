@extends('admin.layout.index')
@section('title_page', 'Danh sach tin tuc')
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
                                <th>Tieu De</th>
                                <th>Tom Tat</th>
                                <th>The Loai</th>
                                <th>Loai Tin</th>
                                <th>Xem</th>
                                <th>Noi Bat</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tintuc as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>
                                    <p> {{$tt->TieuDe}} </p>
                                    <img width="150px" height="100px" src="upload/tintuc/{{$tt->Hinh}}">
                                </td>
                                <td>{{$tt->TomTat}}</td>
                                <td>{{$tt->loaitin->theloai->Ten}}</td>
                                <td>{{$tt->loaitin->Ten}}</td>
                                <td>{{$tt->SoLuotXem}}</td>
                                <td>
                                    {{$tt->NoiBat}}_
                                    @if($tt->NoiBat==0)
                                    {{'Khong'}}
                                    @else
                                    {{'Co'}}
                                    @endif

                                </td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i> <a href="{{route('tintuc.destroy', $tt->id)}}">Delete</a> </td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('tintuc.edit', $tt->id)}}">Edit</a></td>
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