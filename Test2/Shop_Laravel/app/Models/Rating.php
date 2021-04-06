<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'nn_rating_product';
    public function product()
    {
      return $this->belongsTo('App/Models/Product');
    }
}
