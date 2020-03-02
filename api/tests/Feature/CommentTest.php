<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Comment;
use App\User;

class CommentTest extends TestCase
{
    public function testsCommentAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'body' => 'testsCommentAreCreatedCorrectly'
        ];

        $this->json('POST', '/api/comments', $payload, $headers)
            ->assertStatus(201)
            ->assertJson(['body' => 'testsCommentAreCreatedCorrectly']);
    }

    public function testsCommentAreUpdatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $comment = factory(Comment::class)->create([
            'body' => 'First Body',
            'user_id' => $user->id
        ]);

        $payload = [
            'body' => 'Other thing',
        ];

        $response = $this->json('PUT', '/api/comments/' . $comment->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => $comment->id,
                'body' => 'Other thing'
            ]);
    }

    public function testsCommentAreDeletedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $comment = factory(Comment::class)->create([
            'body' => 'First Body',
            'user_id' => $user->id
        ]);

        $this->json('DELETE', '/api/comments/' . $comment->id, [], $headers)
            ->assertStatus(200);
    }

    public function testsCommentAreListedCorrectly()
    {

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        factory(Comment::class)->create([
            'body' => 'First Comment',
            'user_id' => $user->id
        ]);

        factory(Comment::class)->create([
            'body' => 'Second Comment',
            'user_id' => $user->id
        ]);



        $response = $this->json('GET', '/api/comments', [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'body', 'created_at', 'updated_at'],
            ]);
    }
}
