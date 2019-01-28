@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
                            <small>Danh Sách</small>
                        </h1>
                        <a href="{{route('users.create')}}"><button class="btn btn-success" style="position: absolute;top: 48px;right: 0px;cursor: pointer;z-index:999999;">+ Thêm</button></a>
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
                                <th>Email</th>
                                <th>Ảnh</th>
                                <th>Quyền</th>
                                <th>Chi tiết</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        	@foreach($user as $us)
                            <tr class="odd gradeX" align="center">
                                    <td>{{$us->id}}</td>
                                    <td>{{$us->username}}</td>
                                    <td>{{$us->email}}</td>
                                    <td><p><img width="100px" src="{{$us->images}}"></p></td>
                                    <td>{{$us->level}}</td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('users.show',$us)}}">Chi tiết</a></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw" ></i><form action="{{route('users.destroy',$us)}}" onsubmit="return confirm('Bạn có muốn xóa không?');" style="display: inline-table;" method="POST">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <button type="submit"
                                                {{-- @if(Auth::user()->level > 2)
                                                        {{"disabled"}}
                                                @endif --}}
                                                style="background: none;border: none;">Xóa</button>
                                    </form></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a  href="{{route('users.edit',$us)}}">Edit</a></td>
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