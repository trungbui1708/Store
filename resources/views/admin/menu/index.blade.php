@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Menu
                            <small>Danh Sách</small>
                        </h1>
                        <a href="{{route('menus.create')}}"><button class="btn btn-success" style="position: absolute;top: 48px;right: 0px;cursor: pointer;z-index:999999;">+ Thêm</button></a>
                    </div>
                    <!-- /.col-lg-12 -->
                         @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                   
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Tên không dấu</th>
                                <th>Trạng thái</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        	@foreach($table as $tb)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tb->id}}</td>
                                <td>{{$tb->name}}</td>
                                <td>{{$tb->slug}}</td>
                                <td>{{$tb->status}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw" ></i><form action="{{route('menus.destroy',$tb)}}" onsubmit="return confirm('Bạn có muốn xóa không?');" style="display: inline-table;" method="POST">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <button type="submit" style="background: none;border: none;">Xóa</button>
                                </form></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('menus.edit',$tb)}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection