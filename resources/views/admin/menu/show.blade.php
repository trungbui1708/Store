@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menu</h1>
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
                    <label>Loại danh mục</label>
                    <input class="form-control" name="name" disabled value="{{$menu->name}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Tên không dấu</label>
                    <input class="form-control" name="name" disabled value="{{$menu->slug}}" placeholder="Vui lòng nhập thông tin" />
                </div>
            <a class="btn btn-primary" href="{{route('menus.index')}}" role="button">Back</a>
            </div>
            <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection