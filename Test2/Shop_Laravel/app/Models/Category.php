<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table= "nn_category";

  public function department()
  {
    return $this->belongsTo('App/Models/Department','id','id');
  }
  public function Product()
  {
    return $this->hasMany('App/Models/Product','category_id','id');
  }
  public function getCategory()
  {  $category = Category::all();
    return $category;
  }


}
