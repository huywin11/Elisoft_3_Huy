<?php
namespace App\Repositories\Product;
// use App\Repositories\Product\ProductInterFace;
use App\Repositories\Product\ProductInterFace;
use App\Models\Product;
class ProductRepositories implements ProductInterFace
{

 //  public $NameRepositories;
 //  public function __construct(
 //
 //    ProductNameInterFace  $NameRepositories
 // )
 //  {
 //    // parent::__construct();
 //    $this->NameRepositories = $NameRepositories;
 //
 //  }
  public function model()
  {

    return  Product::class;

  }
  public function getProduct()
  {   $H= Product::where('active',1)->orderBy('view','desc')->limit(3)->get();
     var_dump($H);
  }
}

?>
