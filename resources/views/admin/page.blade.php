@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Trang chủ
          <small>Thống kê</small>
        </h1>
      </div>
      <!-- /.col-lg-12 -->
      @if(session('thongbao'))
      <div class="alert alert-success">
        {{session('thongbao')}}
      </div>
      @endif
      <div  class="col-lg-3 statistical text-center">
        <span class="icon-order"><i class="fa fa-shopping-cart"  aria-hidden="true"></i></span>
        <p style="font-size: 70px;">{{count($order)}}</p>
        <p style="font-size: 16px;">Hóa đơn mới !</p>
        <div class="view-more">
            <p><a href="{{ route('orders.index') }}">Xem thêm...</a></p>
        </div>
      </div>
      <div  class="col-lg-3 statistical text-center">
        <span class="icon-order"><i class="fa fa-university" aria-hidden="true"></i></span>
        <p style="font-size: 70px;">{{count($product)}}</p>
        <p style="font-size: 16px;">Sản phẩm  !</p>
        <div class="view-more">
            <p><a href="{{ route('products.index') }}">Xem thêm...</a></p>
        </div>
      </div>
      <div  class="col-lg-3 statistical text-center">
        <span class="icon-order"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
        <p style="font-size: 70px;">{{count($article)}}</p>
        <p style="font-size: 16px;">Bài viết  !</p>
        <div class="view-more">
            <p><a href="{{ route('articles.index') }}">Xem thêm...</a></p>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection