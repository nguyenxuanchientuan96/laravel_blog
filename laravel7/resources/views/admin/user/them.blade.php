@extends('admin.layout.index')
@section('title_page', 'Them user')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
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
                        <form action="{{route('user.store')}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter User Name" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input  type="email" class="form-control" name="email" placeholder="Please Enter Email" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Re-Password</label>
                                <input class="form-control" type="password" name="passwordAgain" placeholder="Please Enter Re-Password" />
                            </div>
                            <div class="form-group">
                                <label>Permission</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" checked="" type="radio">Thuong
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1"  type="radio">Admin
                                </label>
                                
                            </div>
                            <button type="submit" class="btn btn-success">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection