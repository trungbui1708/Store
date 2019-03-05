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
          <span>Chi tiết hóa đơn</span>
        </div>
        <!-- BSTORE-BREADCRUMB END -->
      </div>
    </div>
    @php
    $json_order = json_decode($order->order_detail,true);
    @endphp
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2 class="page-title">Chi tiết hóa đơn <span style="color: #ff4f4f ;">{{$order->order_code}}</span> </h2>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <div class="form-group">
            <label>Mã hóa đơn</label>
            <input type="text" disabled="" class="form-control" value="{{$order->order_code}}">
          </div>
          <div class="form-group">
            <label>Ngày mua hàng</label>
            <input type="text" disabled="" class="form-control" value="{{$order->created_at}}">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <div class="form-group">
            <label>Ngày nhận hàng</label>
            <input type="text" disabled="" class="form-control" value="{{$order->delivery_date}}">
          </div>
          <div class="form-group">
            <label>Tổng tiền</label>
            <input type="text" disabled="" class="form-control" value="{{number_format($order->sum_money)}} đ">
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table class="table table-bordered" id="cart-summary">
            <thead>
              <tr>
                <th class="cart-product">Hình ảnh</th>
                <th class="cart-description">Sản phẩm</th>
                <th class="cart-avail text-center">Giá tiền</th>
                <th class="cart_quantity text-center">Số lượng</th>
                <th class="cart-total text-right">Tổng tiền</th>
              </tr>
            </thead>
            <tbody class="show_cart">
              @foreach ($json_order as $crt)
              <tr>
                <td class="cart-product">
                  <a href="product/{{$crt['item']['id']}}">
                    <img alt="Blouse" style="width:50px;" src="storage/{{$crt['item']['images']}}">
                  </a>
                </td>
                <td class="cart-description">
                  <p class="product-name">
                    <a href="product/{{$crt['item']['id']}}">{{$crt['item']['name']}}</a>
                  </p>
                  <small>{{$crt['item']['brand']}}</small>

                </td>
                <td class="text-center">
                  <ul class="price">
                    <li class="price">{{number_format($crt['item']['price'])}} <sup>đ</sup></li>
                  </ul>
                </td>
                <td class="cart_quantity text-center">
                  <div class="">
                    <input class="cart-plus-minus" type="text" value="{{$crt['qty']}}" disabled>
                  </div>
                </td>
                <td class="cart-total">
                  <span class="price total_price_catelogs">{{number_format($crt['price'])}}</span><sup>đ</sup>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @if(Session::has('cart'))
          <h1 style="float:right; padding-bottom: 10px;" >Tổng tiền : <span class="total_detail">{{number_format($cart->totalPrice)}}</span><sup>đ</sup> </h1>
          @endif
          @if (session('no_product'))
          <span style="font-size: 20px;color: #ec1e1e">
            {{ session('no_product') }}
          </span>
          @endif 
          @if (session('alert'))
          <label style="font-size: 20px;color:#ec1e1e;">Đặt thành công mã hàng
            <span style="color: #0978ef">
              {{ session('alert') }}
            </span>
          !</label>
          @endif

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="returne-continue-shop">
              <a href="{{route('pages.index')}}" class="continueshoping">
                <i class="fa fa-chevron-left"></i>Quay lại trang chủ</a>
                @if(Auth::check())
                <form action="{{route('create.post.order')}}" method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" value="" name="cart" id="cart">
                  <input type="hidden" value="" name="list_product">
                  <button type="submit" class="buy-class" style="">Mua hàng <i class="fa fa-chevron-right"></i></button>
                </form>
                                {{-- <a href="#" class="procedtocheckout">Mua hàng
                                    
                                </a> --}}
                                @else
                                <a href="{{route('pages.get.login')}}" class="procedtocheckout">Mua hàng
                                  <i class="fa fa-chevron-right"></i>
                                </a>
                                @endif
                              </div>
                            </div>
                          </div>
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