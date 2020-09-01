<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostsTest extends TestCase
{
    protected $baseEndpoint = '/api/v1';

    /** @test */
    public function should_get_posts()
    {
        $response = $this->get($this->baseEndpoint . '/posts');
        $response->assertStatus(200);
    }

    /** @test */
    public function must_save_the_post()
    {
        $post = [
            'title' => 'hotel',
            "author" => 'Jett Hilpert',
            "content" => 'Local app manager. Start apps within your browser, developer tool with local .localhost domain and https out of the box.',
            "tags" => ["node", "organizing", "webapps", "domain", "developer", "https", "proxy"]
        ];

        $response = $this->json('POST', $this->baseEndpoint . '/posts', $post);
        $response->assertStatus(201);
    }
}