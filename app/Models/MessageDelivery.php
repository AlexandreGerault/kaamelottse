<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MessageDelivery
 *
 * @property int $id
 * @property int $order_id
 * @property int $user_sender_id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $sender
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageDelivery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageDelivery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageDelivery query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageDelivery whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageDelivery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageDelivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageDelivery whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageDelivery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MessageDelivery whereUserSenderId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Order $order
 */
class MessageDelivery extends Model
{
    protected $fillable = [
        'user_sender_id', 'content'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_sender_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
