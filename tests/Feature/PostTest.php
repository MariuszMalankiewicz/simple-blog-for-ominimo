<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function test_user_can_create_a_post()
    {
        $postData = [
            'title' => 'Test Post Title',
            'content' => 'This is the body of the test post.',
        ];

        $response = $this->post(route('posts.store'), $postData);

        $response->assertStatus(302);
        $response->assertRedirect('/posts');
        $this->assertDatabaseHas('posts', $postData);
    }

    public function test_user_can_see_all_posts()
    {
        $post = Post::factory()->create(['user_id' => $this->user->id]);

        $response = $this->get(route('posts.index'));

        $response->assertStatus(200);
        $response->assertSee($post->title);
    }

    public function test_user_can_see_single_posts()
    {
        $post = Post::factory()->create(['user_id' => $this->user->id]);

        $response = $this->get(route('posts.show', $post->id));

        $response->assertStatus(200);
        $response->assertSee($post->title);
        $response->assertSee($post->content);
    }

    public function test_user_can_update_a_post()
    {
        $post = Post::factory()->create(['user_id' => $this->user->id]);

        $updatedData = [
            'title' => 'Updated Post Title',
            'content' => 'This is the updated body of the post.',
        ];

        $response = $this->put(route('posts.update', $post->id), $updatedData);

        $response->assertRedirect(route('posts.show', $post->id));
        $this->assertDatabaseHas('posts', $updatedData);
    }

    public function test_user_can_delete_a_post()
    {
        $post = Post::factory()->create(['user_id' => $this->user->id]);

        $response = $this->delete(route('posts.destroy', $post->id));

        $response->assertRedirect('/posts');

        $this->assertDatabaseMissing('posts', [
            'title' => $post->title,
            'content' => $post->content,
        ]);
    }

}
