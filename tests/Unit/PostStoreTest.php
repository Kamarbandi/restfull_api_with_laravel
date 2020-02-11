<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostStoreTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $post = factory(Post::class)->create();
        $dbPost = Post::first();

        $this->assertNotNull($dbPost);
        $this->assertTrue($dbPost->id == $post->id);
    }
}
