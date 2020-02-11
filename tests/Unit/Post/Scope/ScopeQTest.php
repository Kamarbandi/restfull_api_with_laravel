<?php

namespace Tests\Unit\Post\Scope;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScopeQTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSimple()
    {
        $post = factory(Post::class)->create([
            'title' => 'my-blog'
        ]);
        $dbPost = Post::q('blog')->first();
        $this->assertTrue($dbPost->id  == $post->id);
    }

    public function testNotFound()
    {
        factory(Post::class)->create([
            'title' => 'my-another-post',
            'slug' => ''
        ]);
        $dbPost = Post::q('blog')->first();
        $this->assertNull($dbPost);
    }

    public function testSlug()
    {
        $post = factory(Post::class)->create([
            'title' => '',
            'slug' => 'slug-for-first-post'
        ]);
        $dbPost = Post::q('first')->first();
        $this->assertNotNull($dbPost);
        $this->assertTrue($dbPost->id == $post->id);
    }

    public function testCaseinsensitive()
    {
        $post = factory(Post::class)->create([
            'title' => 'MY SUPER POST',
            'slug' => 'slug-for-first-post'
        ]);
        $dbPost = Post::q('Super')->first();
        $this->assertNotNull($dbPost);
        $this->assertTrue($dbPost->id == $post->id);
    }
}
