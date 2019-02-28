@extends('pages.layouts.index')
@section('content')
<section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="index.html">Trang chủ</a>
                        <span><i class="fa fa-caret-right"></i></span>
                        <span>Đăng ký / Đăng nhập</span>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="page-title">Đăng ký / Đăng nhập</h2>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!-- CREATE-NEW-ACCOUNT START -->
                    <div class="create-new-account">
                    <form class="new-account-box primari-box" id="create-new-account" method="post" action="{{route('pages.register')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <h3 class="box-subheading">Đăng ký</h3>
                            <div class="form-content">
                                <p>Please enter your email address to create an account.</p>
                                <div class="form-group primary-form-group">
                                    <label for="email">Họ và Tên</label>
                                    <input type="text" value="{{old('name')}}" name="name" placeholder="Họ và tên" id="name" class="form-control input-feild" required>
                                </div>
                                <div class="form-group primary-form-group">
                                    <label for="email">Email</label>
                                    <input type="text" value="{{old('email')}}" name="email" placeholder="Email" id="email" class="form-control input-feild" required>
                                </div>
                                <div class="form-group primary-form-group">
                                    <label for="email">Mật khẩu</label>
                                    <input type="password" value="{{old('password')}}" placeholder="Mật khẩu" name="password" id="password" class="form-control input-feild" required>
                                </div>
                                <div class="form-group primary-form-group">
                                    <label for="email">Địa chỉ</label>
                                    <input type="text" value="{{old('address')}}" placeholder="Địa chỉ" name="address" id="address" class="form-control input-feild" required>
                                </div>
                                <div class="form-group primary-form-group">
                                    <label for="email">Số điện thoại</label>
                                    <input type="text" value="{{old('phone')}}" name="phone" placeholder="Số điện thoại" id="phone" class="form-control input-feild" required>
                                </div>
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $err)
                                            <p style="color:red;margin: 0px;">{{$err}}</p>                                        @endforeach
                                    </div>
                                @endif
                                <div class="submit-button">
                                    <button type="submit" class="btn main-btn"> <span>
                                            <i class="fa fa-user submit-icon"></i>
                                            Create an account
                                        </span>		</button>
                                    {{-- <a href="checkout-registration.html" id="SubmitCreate" class="btn main-btn">
                                       									
                                    </a> --}}
                                </div>
                            </div>
                        </form>							
                    </div>
                    <!-- CREATE-NEW-ACCOUNT END -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!-- REGISTERED-ACCOUNT START -->
                    <div class="primari-box registered-account">
                    <form class="new-account-box" id="accountLogin" method="post" action="{{route('pages.post.login')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">    
                        <h3 class="box-subheading">Đăng nhập</h3>
                            <div class="form-content">
                                <div class="form-group primary-form-group">
                                    <label for="loginemail">Email address</label>
                                    <input type="text" value="" name="email" id="loginemail" class="form-control input-feild">
                                </div>
                                <div class="form-group primary-form-group">
                                    <label for="password">Password</label>
                                    <input type="password" value="" name="password" id="password" class="form-control input-feild">
                                </div>
                                <div class="forget-password">
                                    <p><a href="#">Forgot your password?</a></p>
                                </div>
                                @if (session('thongbao'))
                                    <p style="color:red;">{{session('thongbao')}}</p>
                                @endif
                                <div class="submit-button">
                                    <button type="submit" class="btn main-btn">
                                        <span>
                                            <i class="fa fa-lock submit-icon"></i>
                                             Sign in
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>							
                    </div>
                    <!-- REGISTERED-ACCOUNT END -->
                </div>
            </div>
        </div>
    </section>
@endsection

