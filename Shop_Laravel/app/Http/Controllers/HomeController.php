<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Product\ProductRepositories;
use Hash;
use Auth;
use respond;
class HomeController extends Controller
{

   private $productRepositories;
 // // public $pr;
  public function __construct(ProductRepositories $productRepositories)
  {
    $this->productRepositories = $productRepositories;
  }
    public function Home(Request $req)
    {
      $product = $this->productRepositories->getProduct();
      return  $product;
    return view('page.trangchu',compact('product'));
    }
}
