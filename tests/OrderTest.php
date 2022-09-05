<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\PHPUnit\MockeryTestCase;

class OrderTest extends TestCase
{
     /** segunda forma de realizar teste em um objeto que ainda não existe no projeto. */
    public function tearDown(): void
    {
         Mockery::close();
    }

    /**
     * Será testado o método process. Mas o objeto PaymentGateway 
     * não existe no programa. Com isso irei realizar um mock desse objeto.
     */
    public function testOderIsProcessed()
    {
        $gateway = $this->getMockBuilder('PaymentGateway')
            ->setMethods(['charge'])
            ->getMock();

        // Configurar o método para o retorno ser true.
        $gateway
            ->method('charge')
            ->willReturn(true);

        $order = new Order($gateway);

        $order->amount = 200;

        $order->process();

        $this->assertTrue($order->process());
    }

    public function testOrderIsProcessedUsingMockery()
    {
        $gateway = Mockery::mock('PaymentGateway');

        $gateway->shouldReceive('charge')
            ->once()
            ->with(200)
            ->andReturn(true);

        $order = new Order($gateway);

        $order->amount = 200;

        $this->assertTrue($order->process());
    }
}
