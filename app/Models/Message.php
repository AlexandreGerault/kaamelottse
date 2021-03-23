<?php

namespace App\Models;

use App\Models\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 * @method static Builder|Message whereCategory($value)
 * @method static Builder|Message whereContent($value)
 * @method static Builder|Message whereCreatedAt($value)
 * @method static Builder|Message whereEmail($value)
 * @method static Builder|Message whereId($value)
 * @method static Builder|Message whereResponded($value)
 * @method static Builder|Message whereSenderIp($value)
 * @method static Builder|Message whereSubject($value)
 * @method static Builder|Message whereUpdatedAt($value)
 * @mixin Eloquent
 * @method static Builder|Message notResponded()
 * @property int|null $author_id
 * @property-read \App\Models\User|null $author
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereAuthorId($value)
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
