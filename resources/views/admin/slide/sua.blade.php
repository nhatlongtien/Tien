 @extends('admin.layout.index')

 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Edit</small>
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
                        <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên Slide</label>
                                <input class="form-control" name="Ten" placeholder="Please Enter Category Name" value="{{$slide->Ten}}" />
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <input class="form-control" name="NoiDung" placeholder="Please Enter Category Order" value="{{$slide->NoiDung}}"/>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="Link" placeholder="Please Enter Category Keywords" value="{{$slide->link}}"/>
                            </div>
                             <div class="form-group">
                                <label>Hinh</label>
                                <p>
                                    <img width="80px" height="80px" src="upload/slide/{{$slide->Hinh}}">
                                </p>
                                <input type="file" name="Hinh">
                            </div>
                        
                            <button type="submit" class="btn btn-default">Edit</button>
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