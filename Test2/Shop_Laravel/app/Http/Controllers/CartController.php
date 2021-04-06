<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Models\Department;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function getCart(){
       $department = new Department();
        $new_department = $department->getDepartment();
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('page.Cart',['cart'=>Session::get('cart'),'items'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
    }
    public function getAddToCart(Request $req){
      // dd($req->qty);
      // die();
      $department = new Department();
       $new_department = $department->getDepartment();
        $product = Product::find($req->id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$req->id,$req->qty);
        Session::put('cart',$cart);
        return redirect()->back();
        }
        public function removeFromCart(Request $req){
            $id = $req->id;
            $oldCart = Session('cart')?Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->totalQty -= $cart->items[$id]['qty'];
            $cart->totalPrice -= $cart->items[$id]['price'];
            Session::put('cart',$cart);
            unset(Session::get('cart')->items[$id]);
            return redirect()->back();
        }
        public function updateToCart(Request $req){
            $data = $req->all();
            $oldCart = null;
            $cart = new Cart($oldCart);
            foreach($data as $k=>$v){
                if($k!='_token'){
                    if($v <= 0){
                        Session::put('cart',$cart);
                        unset(Session::get('cart')->items[$k]);
                    }else{
                        $product = Product::find($k);
                        $cart->add($product,$k,$v);
                        Session::put('cart',$cart);
                    }
                }
            }
            return redirect()->back();
        }
}
