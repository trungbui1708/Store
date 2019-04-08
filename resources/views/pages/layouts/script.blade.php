
<script>

    
    function shorten(str, maxLen, separator = ' ') {
        if (str.length < maxLen) return str;
            return str.substr(0, str.lastIndexOf(separator, maxLen))+"...";
    }

    $(document).ready(function(){
			$('.cart_click').click(function(event){
				event.preventDefault();
				var id = $(this).attr('data-id');
				var url = "{{route('cart.ajax')}}";
				var _token = $('input[name="_token"]').val();
				$.ajax({
                    url :url,
                    method : "post",
                    dataType:'json',
                    cache : false,
                    data : {id:id,_token:_token},
                    success: function(data){
                        console.log("test");
                        var html="";
                        var total= 0;
                        var total_price=0;
                        $.each(data, function(index, value){
                            total+=value.qty;
                            total_price+=value.price;
                            value.item.price = value.item.price.toLocaleString('en-US');
                            html+='<div class="shipping-item"><span class="cross-icon"><a href="" class="delete_cart" data-delete="'+value.item.id+'"><i class="fa fa-times-circle"></i></a></span>';
                            html+='<div class="shipping-item-image"><a href="#"><img style="width:80px;" src="storage/'+value.item.thumbnail+'" alt="shopping image" /></a></div>';
                            html+='<div class="shipping-item-text"><span>'+value.qty+'<span class="pro-quan-x">x</span>';
                            html+='<a href="#" style="text-transform: lowercase;" title="" class="pro-cat">'+shorten(value.item.name,10)+'</a></span>';
                            html+='<p>'+value.item.price+'<sup>đ</sup></p></div></div>';
                            console.log(shorten(value.item.name,10));
                        });
                        console.log(html);
                        $('.list-item-cart').html(html);
                        $('.ajax-cart-quantity').html(total);
                        $('.shipping-total').html(total_price.toLocaleString('en-US') + '<sup>đ</sup>' ); 
                        deleteCart();
                    },
				});
              
			});
    });

    window.addEventListener('load', function() {
        $('body').mouseup(function(){
            if(!$("#search").is(":focus")){
                $('.search_product').hide();
            }
        });
    });
    
    $(document).ready(function(){
        $('#search').keyup(function(){
            var key = $(this).val();
            var _token = $('input[name="_token"]').val();
            if(key != ''){
                $.ajax({
                    url: "{{ route('customer.search')}}",
                    method: "get",
                    data: {
                        key:key, 
                        _token:_token
                    },
                    success: function(data){
                        // console.log(data);
                        $('.search_product').html(data.toString());
                    },
                });
            }
            
        });
    });
    
    function deleteCartIndex(){
        $('.delete_cart_click').click(function(event){
            event.preventDefault();
            var id = $(this).attr('data-delete');
            console.log(id);
            var url = "{{ route('delete.ajax') }}";
             var _token = $('input[name="_token"]').val();
            $.ajax({
                url: url,
                method: "post",
                dataType: 'json',
                data: {id:id, _token:_token},
                success: function(data){
                    console.log(data);
                    if(data!=""){
                        var html="";
                        var total= 0;
                        var total_price=0;
                        $.each(data, function(index, value){
                        total+=value.qty;
                        total_price+=value.price;
                        value.price = value.price.toLocaleString('en-US');
                        html+='<div class="shipping-item"><span class="cross-icon"><a href="" class="delete_cart" data-delete="'+value.item.id+'"><i class="fa fa-times-circle"></i></a></span>';
						html+='<div class="shipping-item-image"><a href="#"><img style="width:80px;" src="storage/'+value.item.thumbnail+'" alt="shopping image" /></a></div>';
						html+='<div class="shipping-item-text"><span>'+value.qty+'<span class="pro-quan-x">x</span>';
						html+='<a href="#" style="text-transform: lowercase;" title="" class="pro-cat">'+shorten(value.item.name,10)+'</a></span>';
                        html+='<p>'+value.item.price+'<sup>đ</sup></p></div></div>';
                        });
                        $('.list-item-cart').html(html);
                        $('.ajax-cart-quantity').html(total);
                        $('.total_price').html(total_price.toLocaleString('de-DE')+ '<sup>đ</sup>'); 
                        deleteCartIndex();
                    }
                    else{
                        $('.ajax-cart-quantity').html(0);
                        $('.list-item-cart').html('<div class="shipping-item"><p>Giỏ hàng trống</p></div>');
                        $('.total_price').html(0);
                    }
                },
            });
        });
    };
    $(document).ready(function(){
        deleteCartIndex();
    });

    window.addEventListener('load', function() {
        $('body').mouseup(function(){
            if(!$("#search").is(":focus")){
                $('.search_product').hide();
            }
        });
        $(document).ready(function(){
            $('#search').keyup(function(){
                var key = $(this).val();
                var _token = $('input[name="_token"]').val();
                if(key != ''){
                    $.ajax({
                        url: "{{ route('customer.search')}}",
                        method: "get",
                        data: {
                            key:key, 
                            _token:_token
                        },
                        success: function(data){
                            console.log(data);
                            $('.search_product').html(data.toString());
                        },
                    });
                }
                
            });
        });
    });
    function deleteOne(){
        $('.delete_one').click(function(event){
            event.preventDefault();
            var id = $(this).data('one');
            var url = "{{ route('web.cart.deleteone') }}";
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: url,
                method: "post",
                dataType: 'json',
                data: {id:id, _token:_token},
                success: function(data){
                    console.log(data);
                    if(data!=""){
                        var html="";
                        var html_cart="";
                        var total= 0;
                        var total_price=0;
                        console.log(data);
                        $.each(data, function(index, value){
                        total+=value.qty;
                        total_price+=value.price;
                        value.price = value.price.toLocaleString('en-US');
                        value.item.price=parseInt(value.item.price).toLocaleString('en-US');
                        
                        html+='<div class="shipping-item"><span class="cross-icon"><a href="" class="delete_cart" data-delete="'+value.item.id+'"><i class="fa fa-times-circle"></i></a></span>';
						html+='<div class="shipping-item-image"><a href="#"><img style="width:40px;" src="storage/'+value.item.thumbnail+'" alt="shopping image" /></a></div>';
						html+='<div class="shipping-item-text"><span>'+value.qty+'<span class="pro-quan-x">x</span>';
						html+='<a href="#" style="text-transform: lowercase;" title="" class="pro-cat">'+value.item.name+'</a></span>';
                        html+='<p>'+value.price+'<sup>đ</sup></p></div></div>';
                        //
                        html_cart+='<tr><td class="cart-total text-right">'+value.item.code_id+'</a></td>';
                        html_cart+='<td class="cart-product"><a href="#"><img alt="Blouse" style="width:50px;" src="storage/'+value.item.thumbnail+'"></a></td>';
                        html_cart+='<td class="cart-description"><p class="product-name"><a href="#">'+value.item.name+'</a></p>';
                        html_cart+='<td class="text-center"><ul class="price"><li class="price">'+value.item.price+'<sup>đ</sup></li></ul></td>';
                        html_cart+='<td class="cart_quantity text-center"><div class=""><input class="cart-plus-minus" type="text" value="'+value.qty+'"disabled>';
                        html_cart+='<div class="incs qtybuttons add_cart" data-id="'+value.item.id+'"></div>';
                        html_cart+='<div class="decs qtybuttons delete_one" data-one="'+value.item.id+'"></div></div></td>';
                        html_cart+='<td class="cart-delete text-center"><span><a href="" class="delete_cart" data-delete="'+value.item.id+'" title="Delete"><i class="fa fa-trash-o"></i></a></span></td>';
                        html_cart+='<td class="cart-total">'+value.price+'<sup>đ</sup></td></tr>';
                        });
                        //console.log(value.price);
                        $('.show_cart').html(html_cart);
                        $('.list_product_cart').html(html);
                        $('.ajax-cart-quantity').html(total);
                        $('.total_detail').html(total_price.toLocaleString('en-US')); 
                        addCart();
                        deleteCart();
                        deleteOne();
                        
                    }
                    else{
                        $('.ajax-cart-quantity').html(0);
                        $('.list_product_cart').html('<div class="shipping-item"><p>Giỏ hàng trống</p></div>');
                        $('.total_detail').html(0);
                        $('.show_cart').html('<tr><td colspan="6" style="text-align: center">Giỏ hàng trống</td></tr>');
                    }
                },
            });
        });
    }
    function addCart(){
        $('.add_cart').click(function(event){
            event.preventDefault();

            var id = $(this).data('id');
            var url = "{{route('cart.ajax')}}";
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: url,
                method: "post",
                dataType: 'json',
                data: {id:id, _token:_token},
                success: function(data){
                    console.log(data);
                    var html="";
                    var html_cart="";
                    var total= 0;
                    var total_price=0;
                    $.each(data, function(index, value){
                        if(value.qty < value.item.quantity)
                        {
                            total+=value.qty;
                        }
                        else
                        {
                            total=value.item.quantity;
                        }
                        console.log(total);
                        total_price+=value.price;
                        value.price = value.price.toLocaleString('en-US');
                        value.item.price=parseInt(value.item.price).toLocaleString('en-US');
                        html+='<div class="shipping-item"><span class="cross-icon"><a href="" class="delete_cart" data-delete="'+value.item.id+'"><i class="fa fa-times-circle"></i></a></span>';
						html+='<div class="shipping-item-image"><a href="#"><img style="width:40px;" src="storage/'+value.item.thumbnail+'" alt="shopping image" /></a></div>';
						html+='<div class="shipping-item-text"><span>'+value.qty+'<span class="pro-quan-x">x</span>';
						html+='<a href="#" style="text-transform: lowercase;" title="" class="pro-cat">'+value.item.name+'</a></span>';
                        html+='<p>'+value.price+'<sup>đ</sup></p></div></div>';
                        //
                        html_cart+='<tr><td class="cart-product">'+value.item.code_id+'</a></td>';
                        html_cart+='<td class="cart-product"><a href="#"><img alt="Blouse" style="width:50px;" src="storage/'+value.item.thumbnail+'"></a></td>';
                        html_cart+='<td class="cart-description"><p class="product-name"><a href="#">'+value.item.name+'</a></p>';
                        html_cart+='<td class="text-center"><ul class="price"><li class="price">'+value.item.price+'<sup>đ</sup></li></ul></td>';
                        html_cart+='<td class="cart_quantity text-center"><div class=""><input class="cart-plus-minus" type="text" value="'+value.qty+'"disabled>';
                        html_cart+='<div class="incs qtybuttons add_cart" data-id="'+value.item.id+'"></div>';
                        html_cart+='<div class="decs qtybuttons delete_one" data-one="'+value.item.id+'"></div></div></td>';
                        html_cart+='<td class="cart-delete text-center"><span><a href="" class="delete_cart" data-delete="'+value.item.id+'" title="Delete"><i class="fa fa-trash-o"></i></a></span></td>';
                        html_cart+='<td class="cart-total">'+value.price+'<sup>đ</sup></td></tr>';
                    });
                    $('.show_cart').html(html_cart);
                    $('.list_product_cart').html(html);
                    $('.ajax-cart-quantity').html(total);
                    $('.total_detail').html(total_price.toLocaleString('de-DE')); 
                    addCart();
                    deleteCart();
                    deleteOne();
                },
            });
        });
    }
    function deleteCart(){
        $('.delete_cart').click(function(event){
            event.preventDefault();
            var id = $(this).data('delete');
            var url = "{{ route('delete.ajax') }}";
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: url,
                method: "post",
                dataType: 'json',
                data: {id:id, _token:_token},
                success: function(data){
                    console.log(data);
                    if(data!=""){
                        var html="";
                        var html_cart="";
                        var total= 0;
                        var total_price=0;
                        $.each(data, function(index, value){
                        if(value.qty < value.item.quantity)
                        {
                            total+=value.qty;
                        }
                        else
                        {
                            alert('Sản phẩm trong kho không đủ');
                        }
                        total_price+=value.price;
                        value.price = value.price.toLocaleString('en-US');
                        value.item.price=parseInt(value.item.price).toLocaleString('en-US');
                        html+='<div class="shipping-item"><span class="cross-icon"><a href="" class="delete_cart" data-delete="'+value.item.id+'"><i class="fa fa-times-circle"></i></a></span>';
						html+='<div class="shipping-item-image"><a href="#"><img style="width:40px;" src="storage/'+value.item.thumbnail+'" alt="shopping image" /></a></div>';
						html+='<div class="shipping-item-text"><span>'+value.qty+'<span class="pro-quan-x">x</span>';
						html+='<a href="#" style="text-transform: lowercase;" title="" class="pro-cat">'+value.item.name+'</a></span>';
                        html+='<p>'+value.price+'<sup>đ</sup></p></div></div>';
                        //
                        html_cart+='<tr><td class="cart-product">'+value.item.code_id+'</a></td>';
                        html_cart+='<td class="cart-product"><a href="#"><img alt="Blouse" style="width:50px;" src="storage/'+value.item.thumbnail+'"></a></td>';
                        html_cart+='<td class="cart-description"><p class="product-name"><a href="#">'+value.item.name+'</a></p>';
                        html_cart+='<td class="text-center"><ul class="price"><li class="price">'+value.item.price+'<sup>đ</sup></li></ul></td>';
                        html_cart+='<td class="cart_quantity text-center"><div class=""><input class="cart-plus-minus" type="text" value="'+value.qty+'"disabled>';
                        html_cart+='<div class="incs qtybuttons add_cart" data-id="'+value.item.id+'"></div>';
                        html_cart+='<div class="decs qtybuttons delete_one" data-one="'+value.item.id+'"></div></div></td>';
                        html_cart+='<td class="cart-delete text-center"><span><a href="" class="delete_cart" data-delete="'+value.item.id+'" title="Delete"><i class="fa fa-trash-o"></i></a></span></td>';
                        html_cart+='<td class="cart-total">'+value.price+'<sup>đ</sup></td></tr>';                
                     
                        });
                        console.log(html_cart);
                        $('.show_cart').html(html_cart);
                        $('.list_product_cart').html(html);
                        $('.ajax-cart-quantity').html(total);
                        $('.total_detail').html(total_price.toLocaleString('en-US'));
                        addCart();
                        deleteCart();
                        deleteOne();
                        
                    }
                    else{
                        $('.ajax-cart-quantity').html(0);
                        $('.list_product_cart').html('<div class="shipping-item"><p>Giỏ hàng trống</p></div>');
                        $('.total_detail').html(0);
                        $('.show_cart').html('<tr><td colspan="6" style="text-align: center">Giỏ hàng trống</td></tr>');
                    }
                },
            });
        });
    }
    
    $(document).ready(function(){
        addCart();
        deleteOne();
        deleteCart();
    });



    
</script>