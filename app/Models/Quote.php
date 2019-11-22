<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Citation
 *
 * @property int $id
 * @property string $content
 * @property string|null $author
 * @property int $creator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Quote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Quote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Quote query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Quote whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Quote whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Quote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Quote whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Quote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Quote whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\User $creator
 */
class Quote extends Model
{
	protected $fillable = [
        'content', 'author'
    ];

	public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
