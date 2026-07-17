<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieCategoryResource;
use App\Models\MovieCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MovieCategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $categories = MovieCategory::query()
            ->orderBy('category_name')
            ->get();

        return MovieCategoryResource::collection($categories);
    }
}
