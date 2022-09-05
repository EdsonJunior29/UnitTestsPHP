<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

class MockMailerTest extends TestCase
{
    public function testMock()
    {
        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')
            ->willReturn(true);

        $result = $mock->sendMessage('edson@example.com', 'Hello');
        $this->assertTrue($result);
    }

    public function testSendMessageReturnsTrue()
    {
        $this->assertTrue(Mailer::send('edson@teste.com', 'Teste'));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(Exception::class);

        Mailer::send('', '');
    }
}
