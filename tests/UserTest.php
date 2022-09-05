<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        $user = new User;
        $user->first_name = 'Edson';
        $user->surname = 'Junior';

        $this->assertEquals('Edson Junior', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User;

        $this->assertEquals('', $user->getFullName());
    }

    public function testUserHasFirstName()
    {
        $user = new User;
        $user->first_name = 'Edson';

        $this->assertEquals('Edson', $user->first_name);
    }

    public function testUserHasLastName()
    {
        $user = new User;
        $user->surname = 'Junior';

        $this->assertEquals('Junior', $user->surname);
    }

    public function testUserHasFirstNameNotEquals()
    {
        $user = new User;
        $user->first_name = 'Edson';

        $this->assertNotEquals('Junior', $user->first_name);
    }

    /** @test */
    public function userHasLastNameNotEquals()
    {
        $user = new User;
        $user->surname = 'Junior';

        $this->assertNotEquals('Edson', $user->surname);
    }

    public function testNotificationIsSend()
    {
        $user = new User;

        $mock_mailer = $this->createMock(Mailer::class);
        
        $mock_mailer
            ->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('edson@teste.com'), $this->equalTo("Hello"))
            ->willReturn(true);
        
        $user->setMailer($mock_mailer);

        $user->email = 'edson@teste.com';

        $this->assertTrue($user->notify("Hello"));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User;

        $mock_mailer = $this->getMockBuilder(Mailer::class)
            ->setMethods(null)
            ->getMock();
        
        $user->setMailer($mock_mailer);

        $this->expectException(Exception::class);

        $user->notify("Hello");
    }

    
}
