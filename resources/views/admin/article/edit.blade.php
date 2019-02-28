@extends('admin.layouts.index')
@section('content')
	<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài đăng
                            <small>Sửa</small>
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
                        <form action="{{route('articles.update',$article)}}" enctype="multipart/form-data" method="POST">
                        	{{csrf_field()}} {{method_field('PUT')}}
                            <div class="form-group">
                                <label>Tiêu đề</label>
                            <input class="form-control" name="title" value="{{$article->title}}"  placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" name="description"   class="form-control ckeditor" rows="5">{!!$article->description!!}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea id="demo" name="content"   class="form-control ckeditor" rows="5">{!!$article->content!!}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Ảnh nền</label>
                                <input type="file" name="thumbnail" value="{{$article->thumbnail}}" class="form-control" />
                            </div>
                            <div class="form-check">
                                <input type="checkbox" 
                                    @if ($article->status == 1)
                                        {{'checked'}}
                                    @endif 
                                class="form-check-input" id="exampleCheck1" name="status">
                                <label class="form-check-label" for="exampleCheck1">Hiển thị</label>
                              </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
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
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#changeImage").change(function() {
                if($(this).is(":checked"))
                {
                    $(".image").removeAttr('disabled');
                }
                else
                {
                    $(".image").attr('disabled','');
                }
            });
        });
    </script>
@endsection