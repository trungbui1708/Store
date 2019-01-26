@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phân loại</h1>
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
                    <input class="form-control" name="name" disabled value="{{$distribution->name}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Tên không dấu</label>
                    <input class="form-control" name="name" disabled value="{{$distribution->slug}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                        <label>Danh mục</label>
                        <input class="form-control" name="name" disabled value="{{$distribution->category->name}}" placeholder="Vui lòng nhập thông tin" />
                    </div>
                <a class="btn btn-primary" href="{{route('distribution.index')}}" role="button">Back</a>
            </div>
            <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection