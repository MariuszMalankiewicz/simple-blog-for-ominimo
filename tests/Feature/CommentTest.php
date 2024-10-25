<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function test_user_can_add_comment()
    {
        $post = Post::factory()->create(['user_id' => $this->user->user_id]);

        $newComment = [
            'user_id' => $this->user->user_id,
            'content' => 'new comment',
        ];

        $response = $this->post(route('comments.store',$post->id) . '/comments', $newComment);

        $response->assertRedirect(route('posts.show', $post->id));
        // $this->assertCount(1, Comment::all());
        // $this->assertEquals('To jest nowy komentarz.', Comment::first()->body);
    }
}
