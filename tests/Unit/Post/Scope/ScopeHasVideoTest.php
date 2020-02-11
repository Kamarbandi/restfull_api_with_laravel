<?php

namespace Tests\Unit\Post\Scope;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScopeHasVideoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHasVideo()
    {
        $post = factory(Post::class)->create([
            'video_url' => 'https://www.youtube.com/watch?v=Joyz5S0skr4'
        ]);

        $dbPost = Post::hasVideo()->first();
        $this->assertNotNull($dbPost);
        $this->assertTrue($dbPost->id == $post->id);
    }

    public function testHasNotVideo()
    {
        factory(Post::class)->create([
            'video_url' => 'https://www.youtube.com/watch?v=Joyz5S0skr4'
        ]);

        $dbPost = Post::hasNotVideo()->first();
        $this->assertNull($dbPost);
    }
}
