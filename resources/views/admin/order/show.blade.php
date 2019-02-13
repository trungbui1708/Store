    @extends('admin.layouts.index')
    @section('content')
        <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hóa đơn</h1>
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
                        <label>Mã hóa đơn</label>
                        <input class="form-control" name="id" disabled value="{{$order->id}}" placeholder="Vui lòng nhập thông tin" />
                    </div>
                    <div class="form-group">
                        <label>Người mua</label>
                        <input class="form-control" name="name" disabled value="{{$order->user->name}}" placeholder="Vui lòng nhập thông tin" />
                    </div>
                    <div class="form-group">
                        <label>Tổng tiền<nav></nav></label>
                        <input class="form-control" name="name" disabled value="{{$order->sum_money}}" placeholder="Vui lòng nhập thông tin" />
                    </div>
                    <div class="form-group">
                        <label>Ngày giao hàng<nav></nav></label>
                        <input class="form-control" name="name" disabled value="{{$order->delivery_date}}" placeholder="Vui lòng nhập thông tin" />
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <input class="form-control" name="name" disabled value="{{$order->status}}" placeholder="Vui lòng nhập thông tin" />
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <input class="form-control" name="name" disabled value="{{$order->status}}" placeholder="Vui lòng nhập thông tin" />
                    </div>
                    <a class="btn btn-primary" href="{{route('orders.index')}}" role="button">Back</a>
                </div>
                <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    @endsection