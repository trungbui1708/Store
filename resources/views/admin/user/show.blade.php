@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Người dùng</h1>
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
                    <label>Họ và tên</label>
                    <input class="form-control" name="name" disabled value="{{$user->name}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="name" disabled value="{{$user->username}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="name" disabled value="{{$user->email}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" name="name" disabled value="{{$user->address}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <input class="form-control" name="name" disabled value="{{$user->level}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <div class="form-group">
                    <label>Link ảnh</label>
                    <p>Image :<img width="300px" src="storage/{{$user->images}}"></p>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <input class="form-control" name="name" disabled value="{{$user->status}}" placeholder="Vui lòng nhập thông tin" />
                </div>
                <a class="btn btn-primary" href="{{route('users.index')}}" role="button">Back</a>
            </div>
            <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection