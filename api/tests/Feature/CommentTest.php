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
            'body' => 'testsCommentAreCreatedCorrectly',
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
        ]);

        $this->json('DELETE', '/api/comments/' . $comment->id, [], $headers)
            ->assertStatus(200);
    }

    public function testsCommentAreListedCorrectly()
    {
        factory(Comment::class)->create([
            'body' => 'First Comment'
        ]);

        factory(Comment::class)->create([
            'body' => 'Second Comment'
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/comments', [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'body', 'created_at', 'updated_at'],
            ]);
    }
}
