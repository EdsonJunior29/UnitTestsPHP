<?php

class PersonMailer
{
    protected $mailer;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function notify(string $message)
    {
        return Mailer::send($this->email, $message);
    }
}
