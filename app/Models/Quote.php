<?php

namespace App\Models;

use App\Models\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Citation
 *
 * @property int $id
 * @property string $content
 * @property string|null $author
 * @property int $creator_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Quote newModelQuery()
 * @method static Builder|Quote newQuery()
 * @method static Builder|Quote query()
 * @method static Builder|Quote whereAuthor($value)
 * @method static Builder|Quote whereContent($value)
 * @method static Builder|Quote whereCreatedAt($value)
 * @method static Builder|Quote whereCreatorId($value)
 * @method static Builder|Quote whereId($value)
 * @method static Builder|Quote whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read User $creator
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
