@extends('pages.layouts.index')
@section('content')
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- BSTORE-BREADCRUMB START -->
                <div class="bstore-breadcrumb">
                    <a href="index.html">HOMe<span><i class="fa fa-caret-right"></i> </span> </a>
                    <span> <i class="fa fa-caret-right"> </i> </span>
                <a href="shop-gird.html">{{$product_single->distribution->name}}</a>
                    <span>{{$product_single->name}}</span>
                </div>
                <!-- BSTORE-BREADCRUMB END -->
            </div>
        </div>				
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <!-- SINGLE-PRODUCT-DESCRIPTION START -->
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                        <div class="single-product-view">
                              <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="thumbnail_1">
                                    <div class="single-product-image">
                                    <img src="storage/{{$product_single->images}}" alt="single-product-image" />
                                        @if($product_single->images > 0)
                                        <a class="new-mark-box" href="#">sale</a>
                                        @else
                                        <a class="new-mark-box" href="#">new</a>
                                        @endif
                                        <a class="fancybox" href="storage/{{$product_single->images}}" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                    </div>	
                                </div>
                                <div class="tab-pane" id="thumbnail_2">
                                    <div class="single-product-image">
                                        <img src="storage/{{$product_single->thumbnail}}" alt="single-product-image" />
                                        <a class="new-mark-box" href="#">new</a>
                                        <a class="fancybox" href="storage/{{$product_single->thumbnail}}" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                    </div>	
                                </div>
                                {{-- <div class="tab-pane" id="thumbnail_3">
                                    <div class="single-product-image">
                                        <img src="img/product/sale/9.jpg" alt="single-product-image" />
                                        <a class="new-mark-box" href="#">new</a>
                                        <a class="fancybox" href="img/product/sale/9.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                    </div>	
                                </div>
                                <div class="tab-pane" id="thumbnail_4">
                                    <div class="single-product-image">
                                        <img src="img/product/sale/13.jpg" alt="single-product-image" />
                                        <a class="new-mark-box" href="#">new</a>
                                        <a class="fancybox" href="img/product/sale/13.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                    </div>	
                                </div>
                                <div class="tab-pane" id="thumbnail_5">
                                    <div class="single-product-image">
                                        <img src="img/product/sale/7.jpg" alt="single-product-image" />
                                        <a class="new-mark-box" href="#">new</a>
                                        <a class="fancybox" href="img/product/sale/7.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                    </div>	
                                </div>
                                <div class="tab-pane" id="thumbnail_6">
                                    <div class="single-product-image">
                                        <img src="img/product/sale/12.jpg" alt="single-product-image" />
                                        <a class="new-mark-box" href="#">new</a>
                                        <a class="fancybox" href="img/product/sale/12.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                    </div>	
                                </div> --}}
                            </div>										
                        </div>
                        <div class="select-product">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs select-product-tab bxslider">
                                <li class="active">
                                    <a href="#thumbnail_1" data-toggle="tab"><img src="img/product/sidebar_product/1.jpg" alt="pro-thumbnail" /></a>
                                </li>
                                <li>
                                    <a href="#thumbnail_2" data-toggle="tab"><img src="img/product/sidebar_product/2.jpg" alt="pro-thumbnail" /></a>
                                </li>
                                <li>
                                    <a href="#thumbnail_3" data-toggle="tab"><img src="img/product/sidebar_product/3.jpg" alt="pro-thumbnail" /></a>
                                </li>
                                <li>
                                    <a href="#thumbnail_4" data-toggle="tab"><img src="img/product/sidebar_product/4.jpg" alt="pro-thumbnail" /></a>
                                </li>
                                <li>
                                    <a href="#thumbnail_5" data-toggle="tab"><img src="img/product/sidebar_product/5.jpg" alt="pro-thumbnail" /></a>
                                </li>
                                <li>
                                    <a href="#thumbnail_6" data-toggle="tab"><img src="img/product/sidebar_product/6.jpg" alt="pro-thumbnail" /></a>
                                </li>
                            </ul>										
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                        <div class="single-product-descirption">
                        <h2>{{$product_single->name}}</h2>
                            <div class="single-product-social-share">
                                <ul>
                                    <li><a href="#" class="twi-link"><i class="fa fa-twitter"></i>Tweet</a></li>
                                    <li><a href="#" class="fb-link"><i class="fa fa-facebook"></i>Share</a></li>
                                    <li><a href="#" class="g-plus-link"><i class="fa fa-google-plus"></i>Google+</a></li>
                                    <li><a href="#" class="pin-link"><i class="fa fa-pinterest"></i>Pinterest</a></li>
                                </ul>
                            </div>
                            <div class="single-product-review-box">
                                <div class="rating-box">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-empty"></i>
                                </div>
                                <div class="read-reviews">
                                    <a href="#">Read reviews (1)</a>
                                </div>
                                <div class="write-review">
                                    <a href="#">Write a review</a>
                                </div>		
                            </div>
                            <div class="single-product-condition">
                                <p>Reference: <span>demo_1</span></p>
                                <p>Condition: <span>New product</span></p>
                            </div>
                            <div class="single-product-price">
                                @if($product_single->discount > 0)
                                    <h2 style="float: left; padding-right: 10px;">{{discount($product_single->price,$product_single->discount)}}<sup style="text-transform: lowercase">đ</sup></h2>
                                    <h2 style="font-size: 20px;color: #ccc;text-decoration: line-through;">{{number_format($product_single->price)}}<sup style="text-transform: lowercase">đ</sup></h2>
                                @else
                                    <h2>{{number_format($product_single->price)}}<sup style="text-transform: lowercase">đ</sup></h2>  
                                @endif
                            </div>
                            <div class="single-product-desc">
                                <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                <div class="product-in-stock">
                                    <p>300 Items<span>In stock</span></p>
                                </div>
                            </div>
                            <div class="single-product-info">
                                <a href="#"><i class="fa fa-envelope"></i></a>
                                <a href="#"><i class="fa fa-print"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                            </div>
                            <div class="single-product-quantity">
                                <p class="small-title">Quantity</p> 
                                <div class="cart-quantity">
                                    <div class="cart-plus-minus-button single-qty-btn">
                                        <input class="cart-plus-minus sing-pro-qty" type="text" name="qtybutton" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-size">
                                <p class="small-title">Size </p> 
                                <select name="product-size" id="product-size">
                                    <option value="">S</option>
                                    <option value="">M</option>
                                    <option value="">L</option>
                                </select>
                            </div>
                            <div class="single-product-color">
                                <p class="small-title">Color </p> 
                                <a href="#"><span></span></a>
                                <a class="color-blue" href="#"><span></span></a>
                            </div>
                            <div class="single-product-add-cart">
                                <a class="add-cart-text" title="Add to cart" href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SINGLE-PRODUCT-DESCRIPTION END -->
                <!-- SINGLE-PRODUCT INFO TAB START -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="product-more-info-tab">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs more-info-tab">
                                <li class="active"><a href="#moreinfo" data-toggle="tab">more info</a></li>
                                <li><a href="#datasheet" data-toggle="tab">data sheet</a></li>
                                <li><a href="#review" data-toggle="tab">reviews</a></li>
                            </ul>
                              <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="moreinfo">
                                    <div class="tab-description">
                                        <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="datasheet">
                                    <div class="deta-sheet">
                                        <table class="table-data-sheet">			
                                            <tbody>
                                                <tr class="odd">
                                                    <td>Compositions</td>
                                                    <td>Cotton</td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="td-bg">Styles</td>
                                                    <td class="td-bg">Casual</td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>Properties</td>
                                                    <td>Short Sleeve</td>
                                                </tr>
                                            </tbody>
                                        </table>				
                                    </div>
                                </div>
                                <div class="tab-pane" id="review">
                                    <div class="row tab-review-row">
                                        <div class="col-xs-5 col-sm-4 col-md-4 col-lg-3 padding-5">
                                            <div class="tab-rating-box">
                                                <span>Grade</span>
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </div>	
                                                <div class="review-author-info">
                                                    <strong>write A REVIEW</strong>
                                                    <span>06/22/2015</span>
                                                </div>															
                                            </div>
                                        </div>
                                        <div class="col-xs-7 col-sm-8 col-md-8 col-lg-9 padding-5">
                                            <div class="write-your-review">
                                                <p><strong>write A REVIEW</strong></p>
                                                <p>write A REVIEW</p>
                                                <span class="usefull-comment">Was this comment useful to you? <span>Yes</span><span>No</span></span>
                                                <a href="#">Report abuse </a>
                                            </div>
                                        </div>
                                        <a href="#" class="write-review-btn">Write your review!</a>
                                    </div>
                                </div>
                            </div>									
                        </div>
                    </div>
                </div>
                <!-- SINGLE-PRODUCT INFO TAB END -->
                <!-- RELATED-PRODUCTS-AREA START -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="left-title-area">
                            <h2 class="left-title">Sản phẩm khác</h2>
                        </div>	
                    </div>
                    <div class="related-product-area featured-products-area">
                        <div class="col-sm-12">
                            <div class=" row">
                                <!-- RELATED-CAROUSEL START -->
                                <div class="related-product">
                                    @foreach ($product as $prd)
                                     @if($prd->hot == 1)
                                    <!-- SINGLE-PRODUCT-ITEM START -->
                                    <div class="item">
                                        <div class="single-product-item">
                                            <div class="product-image">
                                            <a href="#"><img src="storage/{{$prd->thumbnail}}" alt="product-image" /></a>
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
                                                        <span>1 Review(s)</span>
                                                    </div>
                                                </div>
                                                <a href="product/{{$prd->id}}">{{shorten_string($prd->name,5)}}</a>
                                                <div class="price-box">
                                                    @if($prd->discount > 0)
                                                        <span class="price">{{discount($prd->price,$prd->discount)}}<sup>đ</sup></span>
                                                        <span class="old-price">{{number_format($prd->price)}}<sup>đ</sup></span>
                                                    @else
                                                        <span class="price">{{number_format($prd->price)}}<sup>đ</sup></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>							
                                    </div>
                                    <!-- SINGLE-PRODUCT-ITEM END -->		
                                    @endif	
                                    @endforeach			
                                </div>
                                <!-- RELATED-CAROUSEL END -->
                            </div>	
                        </div>
                    </div>	
                </div>
                <!-- RELATED-PRODUCTS-AREA END -->
            </div>
            <!-- RIGHT SIDE BAR START -->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <!-- SINGLE SIDE BAR START -->
                <div class="single-product-right-sidebar">
                    <h2 class="left-title">Viewed products</h2>
                    <ul>
                        <li>
                            <a href="#"><img src="img/product/sidebar_product/2.jpg" alt="" /></a>
                            <div class="r-sidebar-pro-content">
                                <h5><a href="#">Faded Short ...</a></h5>
                                <p>Faded short sleeves t-shirt with high...</p>
                            </div>
                        </li>
                        <li>
                            <a href="#"><img src="img/product/sidebar_product/4.jpg" alt="" /></a>
                            <div class="r-sidebar-pro-content">
                                <h5><a href="#">Printed Chif ..</a></h5>
                                <p>Printed chiffon knee length dress...</p>
                            </div>
                        </li>
                        <li>
                            <a href="#"><img src="img/product/sidebar_product/6.jpg" alt="" /></a>
                            <div class="r-sidebar-pro-content">
                                <h5><a href="#">Printed Sum ...</a></h5>
                                <p>Long printed dress with thin...</p>
                            </div>
                        </li>
                        <li>
                            <a href="#"><img src="img/product/sidebar_product/1.jpg" alt="" /></a>
                            <div class="r-sidebar-pro-content">
                                <h5><a href="#">Printed Dress </a></h5>
                                <p>100% cotton double printed dress....</p>
                            </div>
                        </li>
                    </ul>
                </div>	
                <!-- SINGLE SIDE BAR END -->
                <!-- SINGLE SIDE BAR START -->
                <div class="single-product-right-sidebar clearfix">
                    <h2 class="left-title">Tags </h2>
                    <div class="category-tag">
                        <a href="#">fashion</a>
                        <a href="#">handbags</a>
                        <a href="#">women</a>
                        <a href="#">men</a>
                        <a href="#">kids</a>
                        <a href="#">New</a>
                        <a href="#">Accessories</a>
                        <a href="#">clothing</a>
                        <a href="#">New</a>
                    </div>							
                </div>	
                <!-- SINGLE SIDE BAR END -->
                <!-- SINGLE SIDE BAR START -->						
                <div class="single-product-right-sidebar">
                    <div class="slider-right zoom-img">
                        <a href="#"><img class="img-responsive" src="img/product/cms11.jpg" alt="sidebar left" /></a>
                    </div>							
                </div>
            </div>
            <!-- SINGLE SIDE BAR END -->				
        </div>
    </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->
@endsection