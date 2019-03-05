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
          <span>My account</span>
        </div>
        <!-- BSTORE-BREADCRUMB END -->
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2 class="page-title">My account</h2>
      </div>
      <div class="account-info-text">
        Chào mừng bạn đến với tài khoản của bạn. Tại đây bạn có thể quản lý tất cả các thông tin cá nhân và đơn đặt hàng của bạn.
      </div>
      @if(session('thongbao'))
      <div class="alert alert-success">
        {{session('thongbao')}}
      </div>
      @endif
      <!-- ACCOUNT-INFO-TEXT START -->
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="account-info">
          <div class="single-account-info">
            <ul>
              <li><a href="#"><i class="fa fa-building"></i><span>Cập nhập thông tin cá nhân</span> </a></li>
              <li><a href="{{route('change.password')}}"><i class="fa fa-list-ol"></i><span>Đổi mật khẩu</span> </a></li>
              <li><a href="#"><i class="fa fa-file-o"></i><span>Đổi ảnh đại điện</span> </a></li>
              <li><a href="{{route('pages.order')}}"><i class="fa fa-building"></i><span>Tất cả các hóa đơn</span> </a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="account-info">
          <div class="single-account-info">
            <ul>
              <li><a href="wishlist.html"><i class="fa fa-heart"></i><span>My wishlists</span> </a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- ACCOUNT-INFO-TEXT END -->
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