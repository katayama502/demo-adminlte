<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sku','name','price','cost','stock','views','likes','is_active'];

    public function scopeKeyword($q, ?string $kw)
    {
        if (!$kw) return $q;
        $kw = trim($kw);
        return $q->where(function($qq) use ($kw){
            $qq->where('name','like',"%{$kw}%")
               ->orWhere('sku','like',"%{$kw}%");
        });
    }

    public function orderItems() { return $this->hasMany(OrderItem::class); }
    public function stats() { return $this->hasMany(ProductStat::class); }

    public function getProfitRateAttribute(): float
    {
        if ($this->price <= 0) return 0;
        return round((($this->price - $this->cost) / $this->price) * 100, 2);
    }
}

