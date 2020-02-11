<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IsIdTermTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $res = is_id_term('id:1');
        $this->assertTrue($res);
    }

    public function testCustomName()
    {
        $res = is_id_term('user_id:777', $id, 'user_id');
        $this->assertTrue($res);
        $this->assertTrue($id == 777);
    }
}
