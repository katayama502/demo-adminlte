<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_date'];
    public function items(){ return $this->hasMany(OrderItem::class); }
    public function getTotalAttribute(){ return $this->items->sum('subtotal'); }
    public function getProfitAttribute(){ return $this->items->sum('profit'); }
}
