<header class="main-menu-area">
    <div class="container">
        <div class="row">
            <!-- SHOPPING-CART START -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right shopingcartarea">
                <div class="shopping-cart-out pull-right">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @if(Session::has('cart'))
                    @php
                        $cart = Session('cart');
                        $list_product = $cart->items;
                        //dd($list_product);
                    @endphp
                <div class="shopping-cart">
                    <a class="shop-link" href="{{route('cart.detail')}}" title="View my shopping cart">
                        <i class="fa fa-shopping-cart cart-icon"></i>
                        <b>My Cart</b>
                    <span class="ajax-cart-quantity">@if(Session::has('cart')){{Session('cart')->totalQuantity}}@else 0 @endif</span>
                    </a>
                    <div class="shipping-cart-overly" >
                        <div class="list-item-cart" style="max-height: 300px;overflow-y:scroll;">
                            @foreach ($list_product as $crt)
                            <div class="shipping-item">
                                <span class="cross-icon"><a href="#" class="delete_cart_click" data-delete="{{$crt['item']['id']}}"><i class="fa fa-times-circle"></i></a></span>
                                <div class="shipping-item-image">
                                <a href="#"><img style="width:80px;" src="storage/{{$crt['item']['thumbnail']}}" alt="shopping image" /></a>
                                </div>
                                <div class="shipping-item-text">
                                <span>{{$crt['qty']}}<span class="pro-quan-x">x</span> <a class="ellipsis" href="#" style="text-transform: lowercase;" title="{{$crt['item']['name']}}" class="pro-cat">{{shorten_string($crt['item']['name'],2)}}</a></span>
                                    <span class="pro-quality"><a href="#">{{$crt['item']['brand']}}</a></span>
                                    <p>{{number_format($crt['price'])}}<sup>đ</sup></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="shipping-total-bill">
                            <div class="total-shipping-prices">
                                <span>Tổng tiền: </span>
                                <span class="shipping-total" ><span class="total_price">{{number_format($cart->totalPrice)}}<sup>đ</sup></span>
                            </div>										
                        </div>
                        <div class="shipping-checkout-btn">
                            <a href="{{route('cart.detail')}}">Check out <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                @else
                <div class="shopping-cart">
                    <a class="shop-link" href="{{route('cart.detail')}}" title="View my shopping cart">
                        <i class="fa fa-shopping-cart cart-icon"></i>
                        <b>My Cart</b>
                    <span class="ajax-cart-quantity">0</span>
                    </a>
                    <div class="shipping-cart-overly">
                            <div class="list-item-cart" style="max-height: 300px;overflow-y:scroll;">    
                                 <div class="shipping-item">
                                    
                                    <div class="shipping-item-text">
                                   
                                        <p>Giỏ hàng trống</p>
                                    </div>
                                </div>
                            </div>
                        <div class="shipping-total-bill">
                            <div class="total-shipping-prices">
                                <span class="shipping-total">0<sup>đ</sup> </span>
                                <span>Tổng tiền: </span>
                            </div>										
                        </div>
                        <div class="shipping-checkout-btn">
                            <a href="checkout.html">Check out <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                @endif
                </div>
            </div>	
            <!-- SHOPPING-CART END -->
            <!-- MAINMENU START -->
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding-right menuarea">
                <div class="mainmenu">
                    <nav>
                        <ul class="list-inline mega-menu">
                            <li class="active"><a href="index.html">Trang chủ</a>
                                </li>
                            @foreach ($menu as $mn)
                            <li>
                            <a>{{$mn->name}}</a>
                                <!-- DRODOWN-MEGA-MENU START -->
                                <div class="drodown-mega-menu">
                                    @foreach ($category as $ca)
                                    @if ($ca->menu_id)
                                        @if ($ca->menu_id == $mn->id)
                                            <div class="left-mega col-xs-6">
                                                <div class="mega-menu-list">
                                                <a class="mega-menu-title" href="category/{{$ca->id}}/{{$ca->slug}}.html">{{$ca->name}}</a>
                                                    <ul>
                                                        @foreach ($distribution as $dtbt)
                                                            @if( $dtbt->category_id == $ca->id)
                                                                <li><a href="distribution/{{$dtbt->id}}/{{$dtbt->slug}}.html">{{$dtbt->name}}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    @endforeach
                                </div>
                            @endforeach
                            </ul>
                    </nav>
                </div>
            </div>
            <!-- MAINMENU END -->
        </div>
        <div class="row">
            <!-- MOBILE MENU START -->
            <div class="col-sm-12 mobile-menu-area">
                <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                    <span class="mobile-menu-title">MENU</span>
                    <nav>
                        <ul>
                            <li><a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">Home variation 1</a></li>
                                    <li><a href="index-2.html">Home variation 2</a></li>
                                </ul>														
                            </li>								
                            <li><a href="shop-gird.html">Women</a>
                                <ul>
                                    <li><a href="shop-gird.html">Tops</a>
                                        <ul>
                                            <li><a href="shop-gird.html">T-Shirts</a></li>
                                            <li><a href="shop-gird.html">Blouses</a></li>
                                        </ul>													
                                    </li>
                                    <li><a href="shop-gird.html">Dresses</a>
                                        <ul>
                                            <li><a href="shop-gird.html">Casual Dresses</a></li>
                                            <li><a href="shop-gird.html">Summer Dresses</a></li>
                                            <li><a href="shop-gird.html">Evening Dresses</a></li>	
                                        </ul>	
                                    </li>

                                </ul>
                            </li>
                            <li><a href="shop-gird.html">men</a>
                                <ul>											
                                    <li><a href="shop-gird.html">Tops</a>
                                        <ul>
                                            <li><a href="shop-gird.html">Sports</a></li>
                                            <li><a href="shop-gird.html">Day</a></li>
                                            <li><a href="shop-gird.html">Evening</a></li>
                                        </ul>														
                                    </li>
                                    <li><a href="shop-gird.html">Blouses</a>
                                        <ul>
                                            <li><a href="shop-gird.html">Handbag</a></li>
                                            <li><a href="shop-gird.html">Headphone</a></li>
                                            <li><a href="shop-gird.html">Houseware</a></li>
                                        </ul>														
                                    </li>
                                    <li><a href="shop-gird.html">Accessories</a>
                                        <ul>
                                            <li><a href="shop-gird.html">Houseware</a></li>
                                            <li><a href="shop-gird.html">Home</a></li>
                                            <li><a href="shop-gird.html">Health & Beauty</a></li>
                                        </ul>														
                                    </li>
                                </ul>										
                            </li>
                            <li><a href="shop-gird.html">clothing</a></li>
                            <li><a href="shop-gird.html">tops</a></li>
                            <li><a href="shop-gird.html">T-shirts</a></li>
                            <li><a href="#">Delivery</a></li>
                            <li><a href="about-us.html">About us</a></li>
                        </ul>
                    </nav>
                </div>						
            </div>
            <!-- MOBILE MENU END -->
        </div>
    </div>
</header>