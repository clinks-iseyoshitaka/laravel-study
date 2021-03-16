<?php

namespace Tests\Feature;

use App\Models\User;
// use DatabaseMigrations; // テスト用データベースを使用
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    // use RefreshDatabase;
    // use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        // ユーザーを１つ作成
        // $user = factory(User::class)->create();

        // // 認証済み、つまりログイン済みしたことにする
        // $this->actingAs($user);

        // // 認証されていることを確認
        // $this->assertTrue(Auth::check());

        $response = $this->get('/contact');

        $this->assertTrue(true);
    }
}
