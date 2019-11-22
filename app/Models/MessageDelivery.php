<?php

namespace App\Models;
use App\User;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\MessageDelivery
 *
 * @property int $id
 * @property int $order_id
 * @property int $user_sender_id
 * @property string $content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $sender
 * @method static Builder|MessageDelivery newModelQuery()
 * @method static Builder|MessageDelivery newQuery()
 * @method static Builder|MessageDelivery query()
 * @method static Builder|MessageDelivery whereContent($value)
 * @method static Builder|MessageDelivery whereCreatedAt($value)
 * @method static Builder|MessageDelivery whereId($value)
 * @method static Builder|MessageDelivery whereOrderId($value)
 * @method static Builder|MessageDelivery whereUpdatedAt($value)
 * @method static Builder|MessageDelivery whereUserSenderId($value)
 * @mixin Eloquent
 * @property-read Order $order
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
