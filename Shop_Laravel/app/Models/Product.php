<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table= "nn_product";

  public function category()
  {
    return $this->belongsTo('App/Models/Category','id','id');
  }

  public function getProduct()
  {   $product = Product::all();
      // print_r($product);die();
      $get_product = Product::where('active',1)->orderBy('view','desc')->limit(20)->get();
      // print_r(  $get_product);die();
     return $get_product;
  }
  // public function  updateView()
  // {
  //   $postId = 'xxx';
  //   $updateViews=db::table(Product)->where('id',$postId) 'UPDATE table_posts SET views = views + 1 WHERE id = ' . $postId . ');
  //   $updateViews=Product::
  //   $post = PostModel::findOrFail($postId);
  //   $post->increment('views');
  // }


}
