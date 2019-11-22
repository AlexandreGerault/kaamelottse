<?php

namespace App\Models;

use App\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $customer_id
 * @property int $status
 * @property float $total_price
 * @property string $shipping_address
 * @property string|null $method_payment
 * @property int $total_points
 * @property string|null $phone
 * @property int $delivery_rating
 * @property int $delivery_driver_id
 * @property string|null $paid_at
 * @property string|null $shipped_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $customer
 * @property-read User $deliveryDriver
 * @property-read Collection|OrderItem[] $items
 * @property-read int|null $items_count
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereCustomerId($value)
 * @method static Builder|Order whereDeliveryDriverId($value)
 * @method static Builder|Order whereDeliveryRating($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereMethodPayment($value)
 * @method static Builder|Order wherePaidAt($value)
 * @method static Builder|Order wherePhone($value)
 * @method static Builder|Order whereShippedAt($value)
 * @method static Builder|Order whereShippingAddress($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereTotalPoints($value)
 * @method static Builder|Order whereTotalPrice($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|MessageDelivery[] $messages
 * @property-read int|null $messages_count
 * @method static Builder|Order byDriver(User $user)
 * @method static Builder|Order noDriver()
 * @method static Builder|Order byCustomer(User $user)
 */
class Order extends Model
{

    protected $dates = [
        'shipped_at',
        'paid_at',
        'created_at',
        'updated_at'
    ];

    protected $fillable = ['status', 'total_price', 'shipping_address', 'method_payment', 'phone', 'total_points'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
	
    public function messages()
    {
        return $this->hasMany(MessageDelivery::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function deliveryDriver()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeNoDriver(Builder $query)
    {
        return $query->whereDoesntHave('deliveryDriver')->where('status', config('ordering.status.PENDING'));
    }

    public function scopeByDriver(Builder $query, User $user)
    {
        return $query->whereHas('deliveryDriver', function (Builder $query) use ($user) {
            return $query->where('id', $user->id);
        })->where('status', config('ordering.status.IN_DELIVERY'));
    }

    public function scopeByCustomer(Builder $query, User $user)
    {
        return $query->whereHas('deliveryDriver', function (Builder $query) use ($user) {
            return $query->where('customer_id', $user->id);
        });
    }

}
