<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'stream_id',
    'kinopoisk_url',
    'name',
    'o_name',
    'cover_big',
    'movie_image',
    'releasedate',
    'episode_run_time',
    'youtube_trailer',
    'director',
    'actors',
    'cast',
    'description',
    'plot',
    'age',
    'rating_mpaa',
    'rating_kinopoisk',
    'rating_count_kinopoisk',
    'country',
    'genre',
    'backdrop_path',
    'tmdb_id',
    'backdrop',
    'rating',
    'duration_secs',
    'duration',
    'video',
    'audio',
    'bitrate',
])]
class MoviesInfo extends Model
{
    protected $table = 'movies_infos';

    protected function casts(): array
    {
        return [
            'releasedate' => 'date',
            'rating_kinopoisk' => 'float',
            'backdrop_path' => 'array',
            'video' => 'array',
            'audio' => 'array',
            'episode_run_time' => 'integer',
            'rating_count_kinopoisk' => 'integer',
            'duration_secs' => 'integer',
            'bitrate' => 'integer',
        ];
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movies::class, 'stream_id', 'stream_id');
    }
}
