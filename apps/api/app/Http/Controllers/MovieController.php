<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListMoviesRequest;
use App\Http\Resources\MovieInfoResource;
use App\Http\Resources\MovieResource;
use App\Models\MovieCategory;
use App\Models\Movies;
use App\Models\MoviesInfo;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MovieController extends Controller
{
    public function index(
        ListMoviesRequest $request,
        string $categoryId,
    ): AnonymousResourceCollection {
        if ($categoryId !== '0') {
            MovieCategory::query()
                ->where('category_id', $categoryId)
                ->firstOrFail();
        }

        $movies = Movies::query()
            ->when(
                $categoryId !== '0',
                fn ($query) => $query->where('category_id', $categoryId),
            )
            ->orderBy('name')
            ->paginate($request->perPage())
            ->withQueryString();

        return MovieResource::collection($movies);
    }

    public function info(int $streamId): MovieInfoResource
    {
        $info = MoviesInfo::query()
            ->where('stream_id', $streamId)
            ->firstOrFail();

        return new MovieInfoResource($info);
    }
}
