<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieInfoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'stream_id' => $this->stream_id,
            'kinopoisk_url' => $this->kinopoisk_url,
            'name' => $this->name,
            'o_name' => $this->o_name,
            'cover_big' => $this->cover_big,
            'movie_image' => $this->movie_image,
            'releasedate' => $this->releasedate?->toDateString(),
            'episode_run_time' => $this->episode_run_time,
            'youtube_trailer' => $this->youtube_trailer,
            'director' => $this->director,
            'actors' => $this->actors,
            'cast' => $this->cast,
            'description' => $this->description,
            'plot' => $this->plot,
            'age' => $this->age,
            'rating_mpaa' => $this->rating_mpaa,
            'rating_kinopoisk' => $this->rating_kinopoisk,
            'rating_count_kinopoisk' => $this->rating_count_kinopoisk,
            'country' => $this->country,
            'genre' => $this->genre,
            'backdrop_path' => $this->backdrop_path,
            'tmdb_id' => $this->tmdb_id,
            'backdrop' => $this->backdrop,
            'rating' => $this->rating,
            'duration_secs' => $this->duration_secs,
            'duration' => $this->duration,
            'video' => $this->video,
            'audio' => $this->audio,
            'bitrate' => $this->bitrate,
        ];
    }
}
