<?php

namespace Tests\Feature;

use App\Livewire\Blogs;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LivewireBlogsTest extends TestCase
{
    use RefreshDatabase;

    public function test_blogs_page_can_be_rendered(): void
    {
        $response = $this->get('/blogs');
        $response->assertStatus(200);
        $response->assertSeeLivewire(Blogs::class);
    }

    public function test_load_more_increments_per_page(): void
    {
        Livewire::test(Blogs::class)
            ->assertSet('perPage', 6)
            ->call('loadMore')
            ->assertSet('perPage', 12);
    }
}
