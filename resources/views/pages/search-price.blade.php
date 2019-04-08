@extends('pages.layouts.index')
@section('content')
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- BSTORE-BREADCRUMB START -->
        <div class="bstore-breadcrumb">
          <a href="index.html">HOMe</a>
          <span><i class="fa fa-caret-right"></i></span>
        <span>
         {{--  @if ($product_price)
            Kết quả tìm kiếm đươc : {{count($product_price)}} sản phẩm
          @else 
            Không có sản phẩm nào
          @endif --}}
          </span>
        </div>
        <!-- BSTORE-BREADCRUMB END -->
      </div>
    </div>
    <div class="row">
      @include('pages.layouts.side-bar')
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="right-all-product">
          <!-- PRODUCT-CATEGORY-HEADER START -->
          <div class="product-category-header">
            <div class="category-header-image">
              <img src="page_asset/img/category-header.jpg" alt="category-header" />
              <div class="category-header-text">
                <h2>Women </h2>
                <strong>You will find here all woman fashion collections.</strong>
                <p>This category includes all the basics of your wardrobe and much more:</p>
                <p>shoes, accessories, printed t-shirts, feminine dresses, women's jeans!</p>
              </div>
            </div>
          </div>
          <!-- PRODUCT-CATEGORY-HEADER END -->
          <div class="product-category-title">
            <!-- PRODUCT-CATEGORY-TITLE START -->
            <h1>
              <span class="cat-name">Women</span>
              <span class="count-product">Tìm kiếm được {{count($product_price)}} sản phẩm.</span>
            </h1>
            <!-- PRODUCT-CATEGORY-TITLE END -->
          </div>
        </div>
        <!-- ALL GATEGORY-PRODUCT START -->
        <div class="all-gategory-product">
          <div class="row">
            @if (isset($product_price))
            <ul class="gategory-product">
              @foreach ($product_price as $dp)
              <!-- SINGLE ITEM START -->
              <li class="cat-product-list">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="single-product-item">
                    <div class="product-image">
                      <a href="single-product.html"><img src="storage/{{$dp->thumbnail}}" alt="product-image" /></a>
                      @if($dp->discount > 0)
                      <a href="#" class="new-mark-box">sale</a>
                      @else
                      <a href="#" class="new-mark-box">new</a>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                  <div class="list-view-content">
                    <div class="single-product-item">
                      <div class="product-info">
                        <div class="customar-comments-box">
                          <a href="product/{{$dp->id}}">{{$dp->name}}</a>
                          <div class="rating-box">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-empty"></i>
                          </div>
                          <div class="review-box">
                            <span>1 Review(s)</span>
                          </div>
                        </div>
                        <div class="product-datails">
                          <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer! </p>
                        </div>
                        <div class="price-box">
                          @if($dp->discount > 0)
                          <span class="price">{{discount($dp->price,$dp->discount)}}<sup>đ</sup></span>
                          <span class="old-price">{{number_format($dp->price)}}<sup>đ</sup></span>
                          @else
                          <span class="price">{{number_format($dp->price)}}<sup>đ</sup></span>
                          @endif
                        </div>
                      </div>
                      <div class="overlay-content-list">
                        <ul>
												<li><a href="#" title="Add to cart"  data-id="{{$dp->id}}" class="add-cart-text cart_click">Add to cart</a></li>
                          <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                          <li><a href="#" title="Add to compare"><i class="fa fa-retweet"></i></a></li>
                          <li><a href="#" title="Add to wishlist"><i class="fa fa-heart-o"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
            @endif
          </div>
        </div>
        <!-- ALL GATEGORY-PRODUCT END -->
        <!-- PRODUCT-SHOOTING-RESULT START -->
        <div class="product-shooting-result product-shooting-result-border">
            <div class="text-center">
                {{$product_price->links()}}
            </div>
        </div>
        <!-- PRODUCT-SHOOTING-RESULT END -->
      </div>

    </div>
  </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->


@endsection