@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Phân loại
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <div class="col-lg-7" style="padding-bottom:120px">
                    	@if(count($errors) > 0)
                    		<div class="alert alert-danger">
                    			@foreach($errors->all() as $err)
                    				{{$err}} <br>
                    			@endforeach
                    		</div>
                    	@endif
                        <form action="{{route('distribution.store')}}" method="POST">
                        	<input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="name" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                    <label>Danh mục</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($category as $ca)
                                            <option value="{{$ca->id}}">{{$ca->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label>Trạng thái</label>
                                        <input class="form-control" name="status" placeholder="Vui lòng nhập thông tin" />
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
@endsection