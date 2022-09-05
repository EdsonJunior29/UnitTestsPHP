<?php

use PHPUnit\Framework\TestCase;

require 'function.php';

class FunctionTest extends TestCase
{
    public function testAddReturnTheCorrectSum()
    {
        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(8, add(5, 3));
    }

    public function testAddDoesNotReturnTheIncorrectSum()
    {
        $this->assertNotEquals(5, add(2, 2));
    }
}
