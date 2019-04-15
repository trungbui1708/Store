@extends('admin.layouts.index')
@section('content')
@php
    $product_decode = json_decode($product->images);
@endphp
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm</h1>
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
                    <label>Tên</label>
                    <input class="form-control" name="name" disabled value="{{$product->name}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Link ảnh</label>
                    @if(isset ($product_decode)  )
                        @foreach ($product_decode as $pd)
                            <p>Image :<img width="300px" src="storage/{{$pd}}"></p>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input class="form-control" name="name" disabled value="{{number_format($product->price)}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input class="form-control" name="quantity" disabled value="{{number_format($product->quantity)}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Giảm giá</label>
                    <input class="form-control" name="name" disabled value="{{$product->discount}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Sản phẩm hot</label>
                    <input class="form-control" name="name" disabled value="{{$product->hot}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Link ảnh nền</label>
                   
                    <p>Image :<img width="300px" src="storage/{{$product->thumbnail}}"></p>
                </div>
                <div class="form-group">
                    <label>Thời gian bảo hành</label>
                    <input class="form-control" name="name" disabled value="{{$product->warranty}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Hãng</label>
                    <input class="form-control" name="name" disabled value="{{$product->brand}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Hãng</label>
                    <input class="form-control" name="name" disabled value="{{$product->distribution->name}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Người nhập</label>
                    <input class="form-control" name="name" disabled value="{{$product->user->name}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <input class="form-control" name="name" disabled value="{{$product->status}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <a class="btn btn-primary" href="{{route('products.index')}}" role="button">Back</a>
                <a class="btn btn-success" href="{{route('products.create')}}" role="button">Thêm</a>
            </div>
            <div style="clear: both"></div>
            <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection