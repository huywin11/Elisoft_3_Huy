<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $table= "nn_department";
  public function category()
  {
    return $this->hasMany('App/Models/Category','department_id','id');
  }
  public function getDepartment()
  {  $department = Department::all();
     return $department;
  }
}
