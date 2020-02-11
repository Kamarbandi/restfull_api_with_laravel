<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetPostsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/posts');
        $response->assertStatus(200);
    }


    public function testJson()
    {
        $posts = factory(Post::class, 10)->create();
        $posts_ids = $posts->pluck('id')->toArray();

        $response = $this->get('/posts');
        $response->assertStatus(200);

        $server_posts = json_decode($response->getContent());
        $server_posts_ids = collect($server_posts)->pluck('id');
        $this->assertTrue(count($server_posts_ids) == count($posts_ids));

        foreach ($server_posts_ids as $id)
        {
            $this->assertTrue(in_array($id, $posts_ids));
        }
    }

    public function testPublished()
    {
        $post = factory(Post::class)->create([
            'published_at' => null,
        ]);

        $post2 = factory(Post::class)->create([
            'published_at' => now()->subDay(),
        ]);

        $response = $this->getJson('/posts?published=1');
        $response->assertStatus(200);

        $server_posts = json_decode($response->getContent());

        $this->assertTrue(count($server_posts) == 1);
        $published_post = $server_posts[0];
        $this->assertTrue($published_post->id == $post2->id);
    }

    public function testGetPostWithVideo()
    {
        $post = factory(Post::class)->create([
            'video_url' => 'https://www.youtube.com/watch?v=Joyz5S0skr4'
        ]);


        $response = $this->getJson('/posts?has_video=1');
        $response->assertStatus(200);

        $server_posts = json_decode($response->getContent());

        $this->assertTrue(count($server_posts) == 1);
        $published_post = $server_posts[0];
        $this->assertTrue($published_post->id == $post->id);
    }
}
