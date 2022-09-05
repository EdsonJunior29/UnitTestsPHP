<?php

use PHPUnit\Framework\TestCase;

class PersonMailerTest extends TestCase
{
    public function testNotifyReturnsTrue()
    {
        $person = new PersonMailer('edson@dev.com');

        $mailer = new Mailer;

        $person->setMailer($mailer);

        $this->assertTrue($person->notify('Hello!'));
    }
}
