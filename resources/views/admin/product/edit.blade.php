@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Sửa</small>
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
                <form action="{{route('products.update',$product)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field()}} {{ method_field('PUT') }}
                    <div class="col-lg-6" style="padding-bottom:120px">
        
                            <div class="form-group">
                                <label>Tên</label>
                            <input class="form-control" name="name" value="{{$product->name}}" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Link ảnh</label>
                                <input class="form-control" type="file" multiple name="images" value="{{$product->images}}" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" class="form-control" name="price" value="{{$product->price}}" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Giảm giá(%)</label>
                                <input class="form-control" name="discount" value="{{$product->discount}}" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Hot</label>
                                <input type="number" class="form-control" name="hot" value="{{$product->hot}}" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Cập nhập thêm số lượng</label>
                                <input type="text" class="form-control" name="quantity" value="{{old('quantity')}}" placeholder="Vui lòng nhập thông tin" />
                                <span>Số lượng trong kho : {{$product->quantity}}</span>
                            </div>
                    </div>
                    <div class="col-lg-6">
                         <div class="form-group">
                                <label>Ảnh nền</label>
                                <input class="form-control" type="file" name="thumbnail" value="{{$product->thumbnail}}" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Thời gian bảo hành</label>
                                <input class="form-control" name="warranty" value="{{$product->warranty}}" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Hãng</label>
                                <input class="form-control" name="brand" value="{{$product->brand}}" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <div class="form-group">
                                <label>Phân loại</label>
                                <select class="form-control" name="distribution_id">
                                    @foreach($distribution as $di)
                                        <option value="{{$di->id}}"
                                            @if($product->distribution_id == $di->id)
                                            {{'selected'}}
                                            @endif
                                            >{{$di->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Người nhập</label>
                                <select class="form-control" name="user_id">
                                    @foreach($user as $ur)
                                        <option value="{{$ur->id}}"
                                            @if($product->user_id == $ur->id)
                                            {{'selected'}}
                                            @endif
                                            >{{$ur->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                            <input class="form-control" value="{{$product->status}}" name="status" placeholder="Vui lòng nhập thông tin" />
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection