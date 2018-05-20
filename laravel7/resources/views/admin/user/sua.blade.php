@extends('admin.layout.index')
@section('title_page', 'Sua user')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
                            <p> {{$user->name}} </p>
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
                        <form action="{{route('user.update', $user->id)}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input  type="email" readonly="true" class="form-control" name="email" value="{{$user->email}}" />
                            </div>
                            <div class="form-group">
                                <label>Do you want to change Password</label>
                                <input type="checkbox" id="changepassword" name="changepassword"  />
                            </div>

                            <div class="form-group">
                                <label> Change Password</label>
                                <input class="form-control password" type="password" name="password" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Re-Password</label>
                                <input class="form-control password" type="password" name="passwordAgain"  disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Permission</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" 
                                    @if($user->quyen==0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Thuong
                                    
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" 
                                      @if($user->quyen==1)
                                    {{"checked"}}
                                    @endif type="radio">Admin
                                </label>
                                
                            </div>
                            <button type="submit" class="btn btn-success">Edit</button>
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

{{-- nut checkbox --}}
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#changepassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }else{
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection