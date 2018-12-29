@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif

                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        <form action="admin/user/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="Ten" placeholder="Please Enter Category Name" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="Email" placeholder="Please Enter Category Order" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="Password" placeholder="Please Enter Category Keywords" />
                            </div>
                            <div class="form-group">
                                <label>Password Again</label>
                                <input type="password" class="form-control" name="PasswordAgain" placeholder="Please Enter Category Keywords" />
                            </div>
                            <div class="form-group">
                                <label>Quyền Người Dùng</label>
                                 <label class="radio-inline">
                                    <input name="Level" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="Level" value="0" type="radio">Thường
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
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