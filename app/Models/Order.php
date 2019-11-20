<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $customer
 * @property-read \App\User $deliveryDriver
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderItem[] $items
 * @property-read int|null $items_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDeliveryDriverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDeliveryRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereMethodPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereShippedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereShippingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereTotalPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Order extends Model
{

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
}
