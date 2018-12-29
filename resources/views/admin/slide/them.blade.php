@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors ->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('loi'))
                            <div class="alert alert-danger">
                                {{session('loi')}}
                            </div>
                        @endif
                        <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên Slide</label>
                                <input class="form-control" name="Ten" placeholder="Please Enter Slide Name" />
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <input class="form-control" name="NoiDung" placeholder="Vui lòng nhập nội dung" />
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="Link" placeholder="Vui lòng nhập đường dẫn" />
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <input type="file" name="Hinh">
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