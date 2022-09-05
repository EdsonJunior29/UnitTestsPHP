<?php

/**
 * User
 * A user of the system
 */

class User
{
    /**
     * First name
     *
     * @var string
     */
    public $first_name;

    /**
     * Last name
     *
     * @var string
     */
    public $surname;

    /**
     * Email address
     *
     * Trabalhando com injeção de depedência.
     * @var string
     */
    public $email;

    /**
     * Mailer object
     *
     * @var Mailer
     */
    protected $mailer;

    /**
     * Get the user's full name from their first name and sername
     *
     * @return string The user's full name
     */
    public function getFullName(): string
    {
        return trim("$this->first_name $this->surname");
    }

    /**
     * Send the user a message
     *
     * @param string $message The message
     * @return boolean True if send. false otherwise
     */
    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }

    /**
     * Set the mailer dependency
     *
     * @param Mailer $mailer The Mailer object
     */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}
