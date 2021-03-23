<?php

namespace App\Models;

use App\Models\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $title
 * @property string|null $subtitle
 * @property string|null $image
 * @property string|null $content
 * @property int $priority
 * @property int $published
 * @property string|null $slug
 * @property string|null $link
 * @property int $author_id
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @method static bool|null forceDelete()
 * @method static Builder|Article newModelQuery()
 * @method static Builder|Article newQuery()
 * @method static \Illuminate\Database\Query\Builder|Article onlyTrashed()
 * @method static Builder|Article published()
 * @method static Builder|Article query()
 * @method static bool|null restore()
 * @method static Builder|Article whereAuthorId($value)
 * @method static Builder|Article whereContent($value)
 * @method static Builder|Article whereCreatedAt($value)
 * @method static Builder|Article whereDeletedAt($value)
 * @method static Builder|Article whereId($value)
 * @method static Builder|Article whereImage($value)
 * @method static Builder|Article whereLink($value)
 * @method static Builder|Article wherePriority($value)
 * @method static Builder|Article wherePublished($value)
 * @method static Builder|Article whereSlug($value)
 * @method static Builder|Article whereSubtitle($value)
 * @method static Builder|Article whereTitle($value)
 * @method static Builder|Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Article withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Article withoutTrashed()
 * @mixin Eloquent
 */
class Article extends Model
{
	use SoftDeletes;

	protected $fillable =[
        'title', 'subtitle', 'image', 'content', 'priority', 'published', 'slug', 'link', 'author_id'
    ];

	//Defauls values
	protected $attributes = [
        'priority' => 0,
    ];

	/**
     * Obtenir l'utilisateur qui a créé l'article
     */
    public function user()
    {
        return $this->belongsTo(User::class,'author_id', 'id');
    }

    /**
     * Only get visibled articles
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('published', 1);
    }
}
