<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $user = factory(User::class)->create();
//        dd($user);
//        $response = $this->withSession(['foo' => 'bar'])->get('/');
//        $this->assertTrue(true);
        $response = $this->json('POST','/user', ['name'=>'sally']);

        $response->assertStatus(200)->assertJson([
            'created' => true,
        ]);
    }
}
