@extends('admin.layouts.index')
@section('content')
	<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài Viết
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-11" style="padding-bottom:120px">
                    	@if(count($errors) > 0)
                    		<div class="alert alert-danger">
                    			@foreach($errors->all() as $err)
                    				{{$err}} <br>
                    			@endforeach
                    		</div>
                    	@endif
                            @if(session('loi'))
                                <div class="alert alert-danger">
                                    {{session('loi')}}
                                </div>
                            @endif
                        <form action="{{route('article.store')}}" enctype="multipart/form-data" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Người nhập</label>
                                <select class="form-control" name="user_id">
                                    @foreach($user as $ur)
                                        <option value="{{$ur->id}}">{{$ur->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="title" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" name="description" class="form-control ckeditor" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea id="demo" name="content" class="form-control ckeditor" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Link Ảnh</label>
                                <input type="text" name="thumbnail" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <input type="text" name="status" class="form-control" />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection