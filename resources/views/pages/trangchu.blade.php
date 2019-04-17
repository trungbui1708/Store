@extends('pages.layouts.index')
@section('content')

<!-- MAIN-MENU-AREA END -->
		<!-- MAIN-CONTENT-SECTION START -->
		{{ csrf_field() }}
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<!-- MAIN-SLIDER-AREA START -->
					<div class="main-slider-area">
						<!-- SLIDER-AREA START -->
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<div class="slider-area">
								<div id="wrapper">
									<div class="slider-wrapper">
										<div id="mainSlider" class="nivoSlider">
											<img class="lazyload" src="page_asset/img/slider/2.jpg" alt="main slider" title="#htmlcaption"/>
											<img class="lazyload" src="page_asset/img/slider/1.jpg" alt="main slider" title="#htmlcaption2"/>
										</div>
										<div id="htmlcaption" class="nivo-html-caption slider-caption">
											<div class="slider-progress"></div>
											<div class="slider-cap-text slider-text1">
												<div class="d-table-cell">
													<h2 class="animated bounceInDown">BEST THEMES</h2>
													<p class="animated bounceInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna aliquam erat volutpat.</p>	
													<a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Read More <i class="fa fa-caret-right"></i></a>													
												</div>
											</div>
										</div>
										<div id="htmlcaption2" class="nivo-html-caption slider-caption">
											<div class="slider-progress"></div>
											<div class="slider-cap-text slider-text2">
												<div class="d-table-cell">
													<h2 class="animated bounceInDown">BEST THEMES</h2>
													<p class="animated bounceInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna aliquam erat volutpat.</p>	
													<a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Read More <i class="fa fa-caret-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>								
							</div>							
						</div>
						<!-- SLIDER-AREA END -->
						<!-- SLIDER-RIGHT START -->
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<div class="slider-right zoom-img m-top">
								<a href="#"><img class="lazyload" class="img-responsive" src="page_asset/img/product/cms11.jpg" alt="sidebar left" /></a>
							</div>
						</div>
						<!-- SLIDER-RIGHT END -->
					</div>
					<!-- MAIN-SLIDER-AREA END -->
				</div>
				<!-- TOW-COLUMN-PRODUCT START -->
				<div class="row tow-column-product">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- NEW-PRODUCT-AREA START -->
						<div class="new-product-area">
							<div class="left-title-area">
								<h2 class="left-title">Bán chạy</h2>
							</div>						
							<div class="row">
								<div class="col-xs-12">
									<div class="row">
										<!-- NEW-PRO-CAROUSEL START -->
										<div class="new-pro-carousel">
                                            <!-- NEW-PRODUCT-SINGLE-ITEM START -->
                      @foreach ($product_seller as $pr)
                      <div class="item">
												<div class="new-product">
													<div class="single-product-item">
														<div class="product-image">
                                                        <a href="#"><img class="lazyload" src="storage/{{$pr->thumbnail}}" alt="product-image" /></a>
															<a href="#" class="new-mark-box">new</a>
															<div class="overlay-content">
																<ul>
																	{{-- {{route('customer.cart.add',$pr->id)}} --}}
																	<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
																	<li><a href="#" class="cart_click"  data-id="{{$pr->id}}" title="Quick view"  ><i class="fa fa-shopping-cart"></i></a></li>
																	<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
																	<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
																</ul>
															</div>
														</div>
														<div class="product-info">
															<div class="customar-comments-box">
																<div class="rating-box">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-half-empty"></i>
																	<i class="fa fa-star-half-empty"></i>
																</div>
																<div class="review-box">
																	<span>{{$pr->views}} Review (s)</span>
																</div>
															</div>
														<a title="{{$pr->name}}" href="product/{{$pr->id}}">{{shorten_string($pr->name,7)}}</a>
															<div class="price-box">
                                                                @if($pr->discount > 0)
                                                                    <span class="price">{{discount($pr->price,$pr->discount)}}</span>
                                                                    <span class="old-price">{{number_format($pr->price)}}<sup>đ</sup></span>
                                                                @else
                                                                    <span class="price">{{number_format($pr->price)}}<sup>đ</sup></span>
                                                                @endif
															</div>
														</div>
													</div>
												</div>
											</div> 
                                            @endforeach
										</div>
										<!-- NEW-PRO-CAROUSEL END -->
									</div>
								</div>
							</div>
						</div>
						<!-- NEW-PRODUCT-AREA END -->
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- NEW-PRODUCT-AREA START -->
						<div class="new-product-area">
							<div class="left-title-area">
								<h2 class="left-title">Sản phẩm được xem nhiều nhất</h2>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="row">
										<!-- NEW-PRO-CAROUSEL START -->
										<div class="new-pro-carousel">
											<!-- NEW-PRODUCT-SINGLE-ITEM START -->
											@foreach ($product_view as $pr)
												<div class="item">
													<div class="new-product">
														<div class="single-product-item">
															<div class="product-image">
																<a href="#"><img class="lazyload" src="storage/{{$pr->thumbnail}}" alt="product-image" /></a>
																<a href="#" class="new-mark-box">new</a>
																<div class="overlay-content">
																	<ul>
																		{{-- {{route('customer.cart.add',$pr->id)}} --}}
																		<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
																		<li><a href="#" class="cart_click"  data-id="{{$pr->id}}" title="Quick view"  ><i class="fa fa-shopping-cart"></i></a></li>
																		<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
																		<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
																	</ul>
																</div>
															</div>
															<div class="product-info">
																<div class="customar-comments-box">
																	<div class="rating-box">
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star-half-empty"></i>
																		<i class="fa fa-star-half-empty"></i>
																	</div>
																	<div class="review-box">
																		<span>{{$pr->views}} Review (s)</span>
																	</div>
																</div>
																<a title="{{$pr->name}}" href="product/{{$pr->id}}">{{shorten_string($pr->name,7)}}</a>
																<div class="price-box">
																	@if($pr->discount > 0)
																		<span class="price">{{discount($pr->price,$pr->discount)}}</span>
																		<span class="old-price">{{number_format($pr->price)}}<sup>đ</sup></span>
																	@else
																		<span class="price">{{number_format($pr->price)}}<sup>đ</sup></span>
																	@endif
																</div>
															</div>
														</div>
													</div>
												</div>
											@endforeach
										</div>
										<!-- NEW-PRO-CAROUSEL END -->
									</div>
								</div>
							</div>
						</div>
						<!-- NEW-PRODUCT-AREA END -->
					</div>

				</div>
				<!-- TOW-COLUMN-PRODUCT END -->
				<div class="row">
					<!-- ADD-TWO-BY-ONE-COLUMN START -->
					<div class="add-two-by-one-column">
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<div class="tow-column-add zoom-img">
								<a href="#"><img class="lazyload" src="images/aaceb27b39a710326a9faab429efd580.jpg" alt="shope-add" /></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="one-column-add zoom-img">
								<a href="#"><img class="lazyload" src="page_asset/img/product/shope-add2.jpg" alt="shope-add" /></a>
							</div>								
						</div>
					</div>
					<!-- ADD-TWO-BY-ONE-COLUMN END -->
				</div>
				<div class="row">
					<!-- FEATURED-PRODUCTS-AREA START -->
					<div class="featured-products-area">
						<div class="center-title-area">
							<h2 class="center-title">Sản phẩm khuyến mãi</h2>
						</div>	
						<div class="col-xs-12">
							<div class="row">
								<!-- FEARTURED-CAROUSEL START -->
								<div class="feartured-carousel">
                                    @foreach ($product_discount as $pd)
									<!-- SINGLE-PRODUCT-ITEM START -->
									<div class="item">
										<div class="single-product-item">
											<div class="product-image">
                                            <a href="#"><img class="lazyload" src="storage/{{$pd->thumbnail}}" alt="product-image" /></a>
													@if($pd->discount > 0)
														<a href="#" class="new-mark-box">sale</a>
													@else
														<a href="#" class="new-mark-box">new</a>
													@endif
												<div class="overlay-content">
													<ul>
														<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
														<li><a href="#"  class="cart_click"  data-id="{{$pd->id}}" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
													</ul>
												</div>
											</div>
											<div class="product-info">
												<div class="customar-comments-box">
													<div class="rating-box">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-empty"></i>
													</div>
													<div class="review-box">
														<span>1 Review (s)</span>
													</div>
												</div>
												<a href="product/{{$pd->id}}" title="{{$pd->name}}">{{shorten_string($pd->name,5)}}</a>
												<div class="price-box">
                                                        @if($pd->discount > 0)
                                                        <span class="price">{{discount($pd->price,$pd->discount)}}</span>
                                                        <span class="old-price">{{number_format($pd->price)}}<sup>đ</sup></span>
                                                    @else
                                                        <span class="price">{{number_format($pd->price)}}<sup>đ</sup></span>
                                                    @endif
												</div>
											</div>
										</div>							
									</div>
									<!-- SINGLE-PRODUCT-ITEM END -->
                                    @endforeach		
								</div>
								<!-- FEARTURED-CAROUSEL END -->
							</div>
						</div>						
					</div>
					<!-- FEATURED-PRODUCTS-AREA END -->
				</div>
				<div class="row">	
					<!-- BESTSELLER-PRODUCTS-AREA START -->
					<div class="bestseller-products-area">
						<div class="center-title-area">
							<h2 class="center-title">Sản phẩm hot</h2>
						</div>	
						<div class="col-xs-12">
							<div class="row">
								<!-- BESTSELLER-CAROUSEL START -->
								<div class="bestseller-carousel">
                                    <!-- BESTSELLER-SINGLE-ITEM START -->
                                    @foreach ($product_hot as $ph)
									<div class="item">
										<div class="single-product-item">
											<div class="product-image">
                                            <a href="#"><img class="lazyload" src="storage/{{$ph->thumbnail}}" alt="product-image" /></a>
												@if($ph->discount > 0)
													<a href="#" class="new-mark-box">sale</a>
												@else
													<a href="#" class="new-mark-box">new</a>
												@endif
												<div class="overlay-content">
													<ul>
														<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
														<li><a  href="{{route('customer.cart.add',$ph->id)}}"  title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
													</ul>
												</div>
											</div>
											<div class="product-info">
												<div class="customar-comments-box">
													<div class="rating-box">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="review-box">
														<span>1 Review (s)</span>
													</div>
												</div>
                                            <a href="product/{{$ph->id}}">{{shorten_string($ph->name,5)}}</a>
												<div class="price-box">
												@if($ph->discount > 0)
													<span class="price">{{discount($ph->price,$ph->discount)}}<sup>đ</sup></span>
													<span class="old-price">{{number_format($ph->price)}}<sup>đ</sup></span>
												@else
													<span class="price">{{number_format($ph->price)}}<sup>đ</sup></span>
												@endif
												</div>
											</div>
										</div>							
                                    </div>
                                    @endforeach
									<!-- BESTSELLER-SINGLE-ITEM END -->					
								</div>	
								<!-- BESTSELLER-CAROUSEL END -->
							</div>
						</div>								
					</div>
					<!-- BESTSELLER-PRODUCTS-AREA END -->
				</div>
				<div class="row">
					<!-- IMAGE-ADD-AREA START -->
					<div class="image-add-area">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<!-- ONEHALF-ADD START -->
							<div class="onehalf-add-shope zoom-img">
								<a href="#"><img class="lazyload" src="images/1e673478d07b0b93d45a0aeb9f9040ca.jpg" alt="shope-add" /></a>
							</div>
							<!-- ONEHALF-ADD END -->
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<!-- ONEHALF-ADD START -->
							<div class="onehalf-add-shope zoom-img">
								<a href="#"><img class="lazyload" src="images/02ef4a7b528a83e79f32b4a338ae00d5.jpg" alt="shope-add" /></a>
							</div>
							<!-- ONEHALF-ADD END -->
						</div>						
					</div>
					<!-- IMAGE-ADD-AREA END -->
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- LATEST-NEWS-AREA START -->
		<section class="latest-news-area">
			<div class="container">
				<div class="row">
					<div class="latest-news-row">
						<div class="center-title-area">
							<h2 class="center-title"><a href="#">blog</a></h2>
						</div>	
						<div class="col-xs-12">
							<div class="row">
								<!-- LATEST-NEWS-CAROUSEL START -->
								<div class="latest-news-carousel">
									@foreach ($article as $al)
									<!-- LATEST-NEWS-SINGLE-POST START -->
									<div class="item">
										<div class="latest-news-post">
											<div class="single-latest-post">
											<a href="{{route('pages.single',$al->slug)}}"><img src="storage/{{$al->thumbnail}}" alt="latest-post" /></a>
												<h2><a href="{{route('pages.single',$al->slug)}}">{{shorten_string($al->title,8)}}</a></h2>
												<p>{{shorten_string($al->description,15)}}</p>
												<div class="latest-post-info">
													<i class="fa fa-calendar"></i><span>{{$al->created_at}}</span>
												</div>
												<div class="read-more">
													<a href="{{route('pages.single',$al->slug)}}">Read More <i class="fa fa-long-arrow-right"></i></a>
												</div>
											</div>
										</div>
									</div>
									<!-- LATEST-NEWS-SINGLE-POST END -->	
									@endforeach							
								</div>	
								<!-- LATEST-NEWS-CAROUSEL START -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- LATEST-NEWS-AREA END -->
@endsection
