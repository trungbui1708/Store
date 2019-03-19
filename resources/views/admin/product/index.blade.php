@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh mục
                            <small>Danh Sách</small>
                        </h1>
                        <a href="{{route('products.create')}}"><button class="btn btn-success" style="position: absolute;top: 48px;right: 0px;cursor: pointer;z-index:999999;">+ Thêm</button></a>
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
                                <th>Mã sản phẩm</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Chi tiết</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        	@foreach($table as $tb)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tb->code_id}}</td>
                                <td>{{$tb->name}}</td>
                                <td><p><img width="100px" src="storage/{{$tb->images}}"></p></td>
                                <td>{{number_format($tb->price)}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('products.show',$tb)}}">Chi tiết</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw" ></i><form action="{{route('products.destroy',$tb)}}" onsubmit="return confirm('Bạn có muốn xóa không?');" style="display: inline-table;" method="POST">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <button type="submit" style="background: none;border: none;">Xóa</button>
                                </form></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('products.edit',$tb)}}">Edit</a></td>
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