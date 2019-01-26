@extends('admin.layouts.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Danh Sách</small>
                        </h1>
                        <a href="{{route('article.create')}}"><button class="btn btn-success" style="position: absolute;top: 48px;right: 0px;cursor: pointer;">+ Thêm</button></a>
                    </div>
                    <!-- /.col-lg-12 -->
                   
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Tên không dấu</th>
                                <th>Xem chi tiết</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                         @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <tbody>
                        	@foreach($article as $al)
                            <tr class="odd gradeX" align="center">
                                <td>{{$al->id}}</td>
                                <td>{{$al->title}}
                                    <p><img width="100px" src="{{$al->thumbnail}}"></p>
                                </td>
                                <td>{{$al->slug}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{{route('article.show',$al)}}">Chi tiết</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw" ></i><form action="{{route('article.destroy',$al)}}"  style="display: inline-table;" method="POST" onsubmit="return confirm('Bạn có muốn xóa không?');">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <button  type="submit" style="background: none;border: none;">Xóa</button>
                                </form></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('article.edit',$al)}}">Edit</a></td>
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