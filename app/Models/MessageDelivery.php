<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageDelivery extends Model
{
    protected $fillable = [
        'user_sender_id', 'content'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class);
    }

}
