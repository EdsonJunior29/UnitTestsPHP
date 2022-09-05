<?php

use PHPUnit\Framework\TestCase;

class ItemTestMethodsTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new ItemTestMethods;

        $this->assertNotEmpty($item->getDescription());
    }

    public function testIdAnInteger()
    {
        $item = new ItemChild;

        $this->assertIsInt($item->getId());
    }

    public function testTokenIsAnString()
    {
        $item = new ItemTestMethods;

        $reflector = new ReflectionClass(ItemTestMethods::class);

        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);

        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    public function testPrefixedTokenStartsWithPrefix()
    {
        $item = new ItemTestMethods;

        $reflector = new ReflectionClass(ItemTestMethods::class);

        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);

        $result = $method->invokeArgs($item, ['example']);

        $this->assertStringStartsWith('example', $result);
    }
}
