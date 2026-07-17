<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['category_id', 'category_name', 'parent_id'])]
class MovieCategory extends Model
{
    public function movies(): HasMany
    {
        return $this->hasMany(Movies::class, 'category_id', 'category_id');
    }
}
