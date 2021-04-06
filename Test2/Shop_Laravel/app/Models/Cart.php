<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

use Session;

class Cart extends Model
{
  use HasFactory;

    public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	// public function add($item, $id){
	// 	$giohang = ['qty'=>0, 'price' => $item->unit_price, 'item' => $item];
	// 	if($this->items){
	// 		if(array_key_exists($id, $this->items)){
	// 			$giohang = $this->items[$id];
	// 		}
	// 	}
	// 	$giohang['qty']++;
	// 	$giohang['price'] = $item->unit_price * $giohang['qty'];
	// 	$this->items[$id] = $giohang;
	// 	$this->totalQty++;
	// 	$this->totalPrice += $item->unit_price;
	// }

	public function add($item, $id,$qty){
	$cart = ['qty'=>0, 'price' => $item->price,'item' => $item];
  	if($this->items){
   		if(array_key_exists($id, $this->items)){
    $cart = $this->items[$id];
   	}
  	}

  	$cart['qty'] += $qty;
  	$cart['price'] = $item->price * $cart['qty'];
  	$this->items[$id] = $cart;
  	$this->totalQty+= $qty;
  	$this->totalPrice += $item->price *$qty;
 }


}
