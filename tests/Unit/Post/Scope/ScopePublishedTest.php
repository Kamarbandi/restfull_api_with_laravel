<?php

namespace Tests\Unit\Post\Scope;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScopePublishedTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testPublished()
    {
        $post = factory(Post::class)->create([
            'published_at' => now()->subDay()
        ]);
        $dbPost = Post::published()->first();

        $this->assertNotNull($dbPost);
        $this->assertTrue($dbPost->id == $post->id);
    }


    public function testNotPublished()
    {
        factory(Post::class)->create([
            'published_at' => null
        ]);
        $dbPost = Post::published()->first();
        $this->assertNull($dbPost);
    }

    public function testNotYetPublished()
    {
        factory(Post::class)->create([
            'published_at' => now()->addDays(3)
        ]);
        $dbPost = Post::published()->first();
        $this->assertNull($dbPost);
    }
}
