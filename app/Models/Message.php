<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Message
 *
 * @property int $id
 * @property int $category
 * @property string $email
 * @property string $subject
 * @property string $sender_ip
 * @property int $responded
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereResponded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereSenderIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message notResponded()
 */
class Message extends Model
{
    protected $fillable = [
        'subject', 'category', 'email', 'content', 'sender_ip'
    ];

    public function scopreResponded(Builder $query)
    {
        return $query->where('responded', true);
    }

    public function scopeNotResponded(Builder $query)
    {
        return $query->where('responded', false);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
