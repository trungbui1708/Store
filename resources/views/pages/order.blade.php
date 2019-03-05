@extends('pages.layouts.index')
@section('content')
<!-- MAIN-MENU-AREA END -->
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- BSTORE-BREADCRUMB START -->
        <div class="bstore-breadcrumb">
          <a href="index.html">HOMe</a>
          <span><i class="fa fa-caret-right	"></i></span>
          <span>Đơn hàng</span>
        </div>
        <!-- BSTORE-BREADCRUMB END -->
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2 class="page-title">Đơn hàng</h2>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- CART TABLE_BLOCK START -->
        <div class="table-responsive">
          <!-- TABLE START -->
          <table class="table table-bordered" id="cart-summary">
            <!-- TABLE HEADER START -->
            <thead>
              <tr>
                <th class="cart-product">Mã hóa đơn</th>
                <th class="cart-avail text-center">Số lượng</th>
                <th class="cart_quantity text-center">Ngày mua hàng</th>
                <th class="cart_quantity text-center">Ngày nhận hàng</th>
                <th class="cart-description">Tổng tiền</th>
                <th class="cart_quantity text-center">Chi tiết đơn hàng</th>
              </tr>
            </thead>
            <!-- TABLE HEADER END -->
            <!-- TABLE BODY START -->
            <tbody>
              @if ($order != null)
              @foreach ($order as $ord)
              <!-- SINGLE CART_ITEM START -->
              <tr>
                <td class="cart-product">
                  <p class="product-name">{{$ord->order_code}}</p>
                </td>
                <td class="cart-product">
                  <p class="product-name">{{$ord->count }}</p>
                </td>
                <td class="cart-avail">{{date('I:H d-m-Y',strtotime($ord->created_at)) }}</td>
                <td class="cart-unit text-center">
                  <p class="product-name text-center">{{date('d-m-Y',strtotime($ord->delivery_date)) }}</p>
                </td>
                <td class="cart_quantity text-center">
                  <p class="product-name">{{number_format($ord->sum_money)}} <sup>đ</sup></p>
                </td>
                <td class="text-center">
                  <p style="font-size: 2em;"><a href="{{route('pages.orderDetail',$ord->id)}}"><i class="fa fa-eye fa-2" aria-hidden="true"></i></a>
                  </p>
                </td>
              </tr>
              <!-- SINGLE CART_ITEM END -->
              @endforeach
              @endif
            </tbody>
            <!-- TABLE BODY END -->
          </table>
          <!-- TABLE END -->
        </div>
        <!-- CART TABLE_BLOCK END -->

      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- BACK TO HOME START -->
        <div class="home-link-menu">
          <ul>
            <li><a href="{{route('pages.index')}}"><i class="fa fa-chevron-left"></i> Home</a></li>
          </ul>
        </div>
        <!-- BACK TO HOME END -->
      </div>
    </div>
  </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->
@endsection