<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStat extends Model
{
    protected $fillable = ['product_id','stat_date','views','likes'];
    public function product(){ return $this->belongsTo(Product::class); }
}
