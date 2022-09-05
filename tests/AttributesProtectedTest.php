<?php

use PHPUnit\Framework\TestCase;

class AttributesProtectedTest extends TestCase
{
    public function testIdIsAnInteger()
    {
        $product = new AttributesProtected;

        $reflector = new ReflectionClass(AttributesProtected::class);

        $property = $reflector->getProperty('product_id');
        $property->setAccessible(true);

        $value = $property->getValue($product);

        $this->assertIsInt($value);
    }
}
