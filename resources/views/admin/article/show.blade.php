@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="col-lg-7" style="padding-bottom:120px">
                <div class="form-group">
                    <label>Người nhập</label>
                <input class="form-control" type="text" value="{{$article->user->name}}" disabled>
                </div>
                <div class="form-group">
                    <label>Tiêu đề</label>
                <input class="form-control" name="title" value="{{$article->title}}" disabled placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Limk</label>
                <input class="form-control" name="title" value="{{$article->slug}}" disabled placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea id="demo" name="description"  disabled class="form-control ckeditor" rows="5">{!!$article->description!!}</textarea>
                </div>
                <div class="form-group">
                    <label>Nội Dung</label>
                    <textarea id="demo" name="content"  disabled class="form-control ckeditor" rows="5">{!!$article->content!!}</textarea>
                </div>
                <div class="form-group">
                    <label>Link Ảnh</label>
                    <p>Image :<img width="300px" src="{{$article->thumbnail}}"></p>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <input type="text" name="status" value="{{$article->status}}" class="form-control" />
                </div>
                <a class="btn btn-primary" href="{{route('articles.index')}}" role="button">Back</a>
            </div>4
            <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection