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
							<span>Đổi mật khẩu</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Đổi mật khẩu</h2>
					</div>	
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <form action="{{route('post.change.password')}}" method="POST" >
                @csrf
                <div class="form-group">
                  <label for="">Nhập mật khẩu mới</label>
                  <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Nhập mật khẩu mới">
                  @if ($errors->has('password'))
                  <small class="text-danger">{{ $errors->first('password') }}</small>
                  @endif
                </div>
                <div class="form-group">
                  <label for="">Nhập lại mật khẩu mới</label>
                  <input type="password" name="password_again" class="form-control" value="{{old('password_again')}}" placeholder="Nhập mật khẩu mới">
                  @if ($errors->has('password_again'))
                  <small class="text-danger">{{ $errors->first('password_again') }}</small>
                  @endif
                </div>
                <button type="submit" class="btn btn-success">Đổi mật khẩu</button>
              </form>
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