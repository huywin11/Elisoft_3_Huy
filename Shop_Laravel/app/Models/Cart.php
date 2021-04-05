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

	public function add($item, $id){
	  $price_unit_or_promo = $item->unit_price;
	  if($item->promotion_price != 0){
	   $price_unit_or_promo = $item->promotion_price;
	  }

	  $giohang = ['qty'=>0, 'price' => $price_unit_or_promo, 'item' => $item];
	  if($this->items){
	   if(array_key_exists($id, $this->items)){
	    $giohang = $this->items[$id];
	   }
	  }
	  $giohang['qty']++;
	  $giohang['price'] = $price_unit_or_promo * $giohang['qty'];

	  $this->items[$id] = $giohang;
	  $this->totalQty++;
	  $this->totalPrice += $price_unit_or_promo;
	 }


}
