@extends('admin.layouts.index')
@section('content')
	   <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thống kê hóa đơn theo ngày
                            <small>Chọn ngày</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('admin.layouts.menu_thongke')
                    
                    <div class="col-lg-12 choise_date" style="margin: 20px 0;">
                        <form action="{{route('post.order.date')}}" method="post" class="form-group" >
                            @csrf
                            <div class="col-lg-4">
                                    
                            <input type="date" name="time_begin" value="{{old('time_begin')}}" class="form-control datetime">
                            </div>
                            <div class="col-lg-4">
                                <input type="date" name="time_finish" value="{{old('time_finish')}}" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-success">Thống kê</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                    </div>
                    
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif

                    <h3>Từ ngày : @if(isset ($time_begin)){{$time_begin}}@endif đến @if(isset ($time_finish)){{$time_finish}}@endif</h3>
                    <h3>Tổng hóa đơn : @if(isset ($order_date)){{count($order_date)}}@endif</h3>
                    <h3>Tổng số sản phẩm : @if(isset ($qty_product_order)){{$qty_product_order}}@endif</h3>
                    <h3>Tổng tiền bán : @if(isset ($money_sum_order)){{number_format($money_sum_order)}}@endif <span>đ</span></h3>
                    <h3>Sản phẩm còn trong kho : @if(isset ($product_qty)){{number_format($money_sum_order)}}@endif</h3>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                   
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Thời gian nhận</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        @if(isset($order_date))
                            @foreach($order_date as $tb)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$tb->id}}</td>
                                    <td>{{$tb->user->name}}</td>
                                    <td>{{$tb->user->email}}</td>
                                    <td>{{$tb->delivery_date}}</td>
                                    <td>{{$tb->created_at}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection