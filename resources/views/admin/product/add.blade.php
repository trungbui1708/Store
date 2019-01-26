@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
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
                        <form action="{{route('product.store')}}" method="POST">
                        	<input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="name" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Link ảnh</label>
                                <input class="form-control" name="images" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" class="form-control" name="price" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Giảm giá(%)</label>
                                <input class="form-control" name="discount" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Màu</label>
                                <input class="form-control" name="color" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Hot</label>
                                <input class="form-control" name="hot" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Ảnh nền</label>
                                <input class="form-control" name="thumbnail" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Thời gian bảo hành</label>
                                <input class="form-control" name="warranty" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Hãng</label>
                                <input class="form-control" name="brand" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Phân loại</label>
                                <select class="form-control" name="distribution_id">
                                    @foreach($distribution as $di)
                                        <option value="{{$di->id}}">{{$di->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Người nhập</label>
                                <select class="form-control" name="user_id">
                                    @foreach($user as $ur)
                                        <option value="{{$ur->id}}">{{$ur->name}}</option>
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