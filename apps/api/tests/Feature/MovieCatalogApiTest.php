<?php

namespace Tests\Feature;

use App\Models\MovieCategory;
use App\Models\Movies;
use App\Models\MoviesInfo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MovieCatalogApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_catalog_routes_require_authentication(): void
    {
        $this->getJson('/api/categories')->assertUnauthorized();
        $this->getJson('/api/categories/0/movies')->assertUnauthorized();
        $this->getJson('/api/movies/100/info')->assertUnauthorized();
    }

    public function test_it_lists_categories(): void
    {
        $this->actingAs(User::factory()->create(), 'api');

        MovieCategory::create([
            'category_id' => '10',
            'category_name' => 'Ação',
            'parent_id' => 0,
        ]);

        $this->getJson('/api/categories')
            ->assertOk()
            ->assertJsonPath('data.0.category_id', '10')
            ->assertJsonPath('data.0.category_name', 'Ação');
    }

    public function test_category_zero_lists_all_movies_and_other_ids_filter_them(): void
    {
        $this->actingAs(User::factory()->create(), 'api');

        MovieCategory::create([
            'category_id' => '10',
            'category_name' => 'Ação',
            'parent_id' => 0,
        ]);
        MovieCategory::create([
            'category_id' => '20',
            'category_name' => 'Drama',
            'parent_id' => 0,
        ]);

        $this->createMovie(100, 'Filme de ação', '10');
        $this->createMovie(200, 'Filme de drama', '20');

        $this->getJson('/api/categories/0/movies')
            ->assertOk()
            ->assertJsonCount(2, 'data');

        $this->getJson('/api/categories/10/movies')
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.stream_id', 100);
    }

    public function test_it_returns_movie_info_by_stream_id(): void
    {
        $this->actingAs(User::factory()->create(), 'api');

        MoviesInfo::create([
            'stream_id' => 100,
            'name' => 'Filme de teste',
            'description' => 'Descrição do filme.',
            'backdrop_path' => ['/imagem.jpg'],
            'video' => ['codec_name' => 'h264'],
            'audio' => ['codec_name' => 'aac'],
        ]);

        $this->getJson('/api/movies/100/info')
            ->assertOk()
            ->assertJsonPath('data.stream_id', 100)
            ->assertJsonPath('data.name', 'Filme de teste')
            ->assertJsonPath('data.video.codec_name', 'h264');
    }

    public function test_it_returns_not_found_for_an_unknown_category(): void
    {
        $this->actingAs(User::factory()->create(), 'api');

        $this->getJson('/api/categories/999/movies')
            ->assertNotFound()
            ->assertJsonPath('error.code', 'NOT_FOUND')
            ->assertJsonPath('error.message', 'Categoria não encontrada.');
    }

    public function test_it_returns_not_found_for_an_unknown_movie_info(): void
    {
        $this->actingAs(User::factory()->create(), 'api');

        $this->getJson('/api/movies/999/info')
            ->assertNotFound()
            ->assertJsonPath('error.code', 'NOT_FOUND')
            ->assertJsonPath('error.message', 'Informações do filme não encontradas.');
    }

    private function createMovie(int $streamId, string $name, string $categoryId): Movies
    {
        return Movies::create([
            'num' => $streamId,
            'name' => $name,
            'stream_type' => 'movie',
            'stream_id' => $streamId,
            'stream_icon' => 'https://example.com/image.jpg',
            'rating' => '8.0',
            'rating_5based' => 4,
            'added' => '1779104386',
            'is_adult' => '0',
            'category_id' => $categoryId,
            'container_extension' => 'mp4',
            'custom_sid' => '',
            'direct_source' => '',
        ]);
    }
}
