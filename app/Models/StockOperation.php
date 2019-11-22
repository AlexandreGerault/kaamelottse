<?php

namespace App\Models;

use App\Traits\HasProduct;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StockOperation
 *
 * @property int $id
 * @property int $product_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StockOperation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StockOperation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StockOperation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StockOperation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StockOperation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StockOperation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StockOperation whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StockOperation whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StockOperation byProduct(\App\Models\Product $product)
 */
class StockOperation extends Model
{
    use HasProduct;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeByProduct(Builder $query, Product $product)
    {
        return $query->whereHas('product', function (Builder $query) use($product) {
            return $query->where('id', $product->id);
        });
    }
}
