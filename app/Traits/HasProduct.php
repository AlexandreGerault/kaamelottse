<?php


namespace App\Traits;


use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

trait HasProduct
{
    public function scopeByProduct(Builder $query, Product $product)
    {
        return $query->whereHas('product', function (Builder $query) use($product) {
            return $query->where('id', $product->id);
        });
    }
}