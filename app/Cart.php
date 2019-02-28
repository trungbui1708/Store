<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
    	if($oldCart){
    		$this->items = $oldCart->items;
    		$this->totalQuantity = $oldCart->totalQuantity;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function addItem($item, $id){
			$giohang = ['qty'=>0, 'price' => ($item->price - $item->price*$item->discount/100 ), 'item' => $item];
	
    	if($this->items){
    		if(array_key_exists($id, $this->items)){
    			$giohang = $this->items[$id];
    		}
    	}
		$giohang['qty']++; //số lượng mặt hàng ++
		$item->price = (int) ($item->price - $item->price*$item->discount/100 );
    	$giohang['price'] = $item->price * $giohang['qty'];

    	// gán lại vào giỏ hàng
    	$this->items[$id] = $giohang;
    	$this->totalQuantity++; // số sản phẩm trong giỏ hàng tăng
    	$this->totalPrice += $item->price;
    }

    public function removeItemSL($id){
    	$this->items[$id]['qty']--;
    	$this->items[$id]['price'] -= $this->items[$id]['item']['price'];

    	$this->totalQuantity--;
    	$this->totalPrice -= $this->items[$id]['item']['price'];
    	if($this->items[$id]['qty']<=0){
    		unset($this->items[$id]);
    	}
	}
	public function removeItem($id){
		$this->totalQuantity-=$this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['item']['price']*$this->items[$id]['qty'];
    	$this->items[$id]['qty']=0;
    	unset($this->items[$id]);
    }
}
