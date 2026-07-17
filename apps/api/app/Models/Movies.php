<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['num', 'name', 'stream_type', 'stream_id', 'stream_icon', 'rating', 'rating_5based', 'added', 'is_adult', 'category_id', 'container_extension', 'custom_sid', 'direct_source'])]
class Movies extends Model
{
    protected $table = 'movies';

    public function category(): BelongsTo
    {
        return $this->belongsTo(MovieCategory::class, 'category_id', 'category_id');
    }

    public function info(): HasOne
    {
        return $this->hasOne(MoviesInfo::class, 'stream_id', 'stream_id');
    }
}
