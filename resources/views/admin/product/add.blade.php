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
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}} <br>
                @endforeach
            </div>
            @endif
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-lg-6" style="padding-bottom:120px">
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="name" value="{{old('name')}}" placeholder="Vui lòng nhập thông tin" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh sản phẩm</label>
                        <input class="form-control" type="file" value="{{old('images')}}" multiple="" name="images[]" placeholder="Vui lòng nhập thông tin" />
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" class="form-control" value="{{old('price')}}" name="price" placeholder="Vui lòng nhập thông tin" />
                        <input type="hidden" name="views">
                    </div>
                    <div class="form-group">
                        <label>Giảm giá(%)</label>
                        <input class="form-control" name="discount" value="{{old('discount')}}" placeholder="Vui lòng nhập thông tin" />
                    </div>
                    <div class="form-check">
                        <input type="checkbox" 
                                        class="form-check-input" id="exampleCheck1" name="hot">
                        <label class="form-check-label" for="exampleCheck1">Hot</label>
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="tdext" class="form-control" value="300" name="quantity" placeholder="Vui lòng nhập thông tin" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Ảnh nhỏ</label>
                        <input class="form-control" type="file" value="{{old('thumbnail')}}" name="thumbnail" placeholder="Vui lòng nhập thông tin" />
                    </div>
                    <div class="form-group">
                        <label>Thời gian bảo hành</label>
                        <input class="form-control" name="warranty" value="{{old('warranty')}}" placeholder="Vui lòng nhập thông tin" />
                    </div>
                    <div class="form-group">
                        <label>Hãng</label>
                        <input class="form-control" name="brand" value="{{old('brand')}}" placeholder="Vui lòng nhập thông tin" />
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
                    <div class="form-check">
                        <input type="checkbox" 
                                        class="form-check-input" id="exampleCheck1" name="status">
                        <label class="form-check-label" for="exampleCheck1">Hiển thị</label>
                    </div>
                    <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" name="description" value="{{old('description')}}" class="form-control ckeditor" rows="5"></textarea>
                            </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Thêm</button>
                        <button type="reset" class="btn btn-warning">Làm mới</button>
                    </div>  
                    
                </div>
            </form>
            </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection