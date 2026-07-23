<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'sku', 'category_id', 'brand_id', 'unit',
        'purchase_price', 'sale_price', 'stock_quantity',
        'reorder_level', 'image', 'description', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'purchase_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    protected $appends = ['image_url', 'category_name', 'brand_name'];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getCategoryNameAttribute()
    {
        return $this->category?->name;
    }

    public function getBrandNameAttribute()
    {
        return $this->brand?->name;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}