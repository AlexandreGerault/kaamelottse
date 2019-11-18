<?php

namespace App\Models;

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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Citation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Citation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Citation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Citation whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Citation whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Citation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Citation whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Citation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Citation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Citation extends Model
{
	protected $fillable =[
        'content', 'author'
    ];
}
