<?php

namespace PiekarskiIT\App\TestClass;

class EmailService
{
    private string $email;
    private string $subject;
    private string $message;
    private array $attachment;
    public function __construct(string $email, string $subject, string $message, array $attachment = [])
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
        $this->attachment = $attachment;
    }

    public function sendEmail()
    {
        if (empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return "Email is required and must be a valid email address";
        }

        if (empty($this->subject)) {
            return "Subject is required";
        }

        if (empty($this->message)) {
            return "Message is required";
        }

        if (empty($this->attachment)) {
            return wp_mail($this->email, $this->subject, $this->message);
        }

        return wp_mail($this->email, $this->subject, $this->message, '', $this->attachment);
    }
}