<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOperation extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
