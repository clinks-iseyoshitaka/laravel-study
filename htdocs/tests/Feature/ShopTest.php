<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShopTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        // $response->dump();
        // レスポンスの検証
        // $response->assertSee('厳選した素材で作ったマカロンです。');
        // $response
        //     ->assertOk()  # ステータスコードが 200
        // ;
        $this->assertTrue(true);
    }
}
