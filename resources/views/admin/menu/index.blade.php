@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Menu
                            <small>Danh Sách</small>
                        </h1>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="position: absolute;top: 48px;right: 77px;cursor: pointer;">Thêm nhiều</button>
                        <a href="{{route('menus.create')}}"><button class="btn btn-success" style="position: absolute;top: 48px;right: 0px;cursor: pointer;">+ Thêm</button></a>
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
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle"><b>Thêm nhiều</b></h5>
                          <button type="button" class="close" style="margin-top: -20px;" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" >&times;</span>
                          </button>
                        </div>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="modal-body">
                                <input type="file" name="file">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                        
                      </div>
                    </div>
                  </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection