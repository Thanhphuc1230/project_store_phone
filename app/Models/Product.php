<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['uuid','name', 'old_price', 'price','intro','content','images','screen','color','weight','quantity','countdown','status_product','category_id'];
}
