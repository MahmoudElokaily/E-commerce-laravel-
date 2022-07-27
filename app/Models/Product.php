<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'price' , 'image' , 'price' ,  'category_id' , 'description' , 'created_at' , 'updated_at'];
    protected $hidden = ['created_at' , 'updated_at'];

    public function category(){
       return $this->belongsTo('App\Models\Category' , 'category_id' , 'id');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User' , 'User_Products' , 'product_id' , 'user_id');
    }
}
