<?php
namespace Test\Unit;

use PHPUnit\Framework\TestCase;

class HomeTest extends TestCase {
    public function testThatHomepageLoads()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
