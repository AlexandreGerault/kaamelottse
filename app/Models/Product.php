<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property int $priority
 * @property int $stock
 * @property float $price
 * @property int $points
 * @property int $available
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|OrderItem[] $ordering
 * @property-read int|null $ordering_count
 * @property-read Collection|StockOperation[] $stockOperations
 * @property-read int|null $stock_operations_count
 * @method static bool|null forceDelete()
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static Builder|Product query()
 * @method static bool|null restore()
 * @method static Builder|Product whereAvailable($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDeletedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereImage($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product wherePoints($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product wherePriority($value)
 * @method static Builder|Product whereStock($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin Eloquent
 * @method static Builder|Product available()
 */
class Product extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name', 'description', 'image', 'priority', 'available', 'price', 'points', 'stock'
    ];

    protected $casts = [
        'available' => 'boolean'
    ];

    /**
     * @return HasMany
     */
    public function stockOperations()
    {
        return $this->hasMany(StockOperation::class);
    }

    /**
     * @return HasMany
     */
    public function ordering()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function scopeAvailable(Builder $query)
    {
        return $query->where('available', 1);
    }
}
