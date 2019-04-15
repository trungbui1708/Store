@extends('admin.layouts.index')
@section('content')
       <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thống kê hóa đơn theo năm
                            <small>Chọn năm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('admin.layouts.menu_thongke')
                    
                    <div class="col-lg-12 choise_date" style="margin: 20px 0;">
                        <form action="{{route('post.order.year')}}" method="post" class="form-group" >
                            @csrf
                            <div class="col-lg-4">
                            
                            <input type="month" name="time_year" id="start" value="{{old('time_month')}}" class="form-control datetime" min="2018-01" value="2020-12">
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

                    <h3>Năm : @if(isset ($time_year)){{$time_year}}@endif </h3>
                    <h3>Tổng hóa đơn : @if(isset ($order_date)){{count($order_date)}}@endif</h3>
                    <h3>Tổng số sản phẩm : @if(isset ($qty_product_order)){{$qty_product_order}}@endif</h3>
                    <h3>Tổng tiền bán : @if(isset ($money_sum_order)){{number_format($money_sum_order)}}@endif <span>đ</span></h3>
                    <h3>Sản phẩm còn trong kho : @if(isset ($product_qty)){{number_format($product_qty)}}@endif</h3>
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