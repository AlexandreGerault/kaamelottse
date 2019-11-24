<?php

namespace App\Models;

use App\Traits\HasProduct;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\StockOperation
 *
 * @property int $id
 * @property int $product_id
 * @property int $quantity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Product $product
 * @method static Builder|StockOperation newModelQuery()
 * @method static Builder|StockOperation newQuery()
 * @method static Builder|StockOperation query()
 * @method static Builder|StockOperation whereCreatedAt($value)
 * @method static Builder|StockOperation whereId($value)
 * @method static Builder|StockOperation whereProductId($value)
 * @method static Builder|StockOperation whereQuantity($value)
 * @method static Builder|StockOperation whereUpdatedAt($value)
 * @mixin Eloquent
 * @method static Builder|StockOperation byProduct(Product $product)
 */
class StockOperation extends Model
{
    use HasProduct;

    /**
     * @return BelongsTo
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
