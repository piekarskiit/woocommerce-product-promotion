<?php

use PHPUnit\Framework\TestCase;
use PiekarskiIT\App\TestClass\EmailService;

class email_service_test extends TestCase
{
    public function set_up(): void {
        parent::setUp();
        WP_Mock::setUp();
    }

    public function tear_down():void {
        WP_Mock::tearDown();
        parent::tearDown();
    }

    public function test_send_email_without_attachment()
    {
        WP_Mock::userFunction( 'wp_mail', [
            'times' => 1,
            'return' => true
        ] );

        $emailService = new EmailService('test@example.com', 'Test Subject', 'Test Message');
        $result = $emailService->sendEmail();

        $this->assertTrue($result);
    }

    public function test_send_email_with_attachment()
    {
        WP_Mock::userFunction( 'wp_mail', [
            'times' => 1,
            'return' => true
        ] );

        $attachment = [
            'file.txt' => 'This is a test attachment',
            'image.jpg' => '/path/to/image.jpg'
        ];

        $emailService = new EmailService(
            'test@example.com',
            'Test Subject',
            'Test Message',
            $attachment
        );

        $result = $emailService->sendEmail();

        $this->assertTrue($result);
    }

    public function test_send_email_with_invalid_email()
    {
        WP_Mock::userFunction( 'wp_mail', [
            'times' => 1,
            'return' => true
        ] );

        $emailService = new EmailService(
            'invalid_email',
            'Test Subject',
            'Test Message'
        );

        $result = $emailService->sendEmail();

        $this->assertEquals("Email is required and must be a valid email address", $result);
    }

    public function test_send_email_with_empty_subject()
    {
        WP_Mock::userFunction( 'wp_mail', [
            'times' => 1,
            'return' => true
        ] );

        $emailService = new EmailService(
            'test@example.com',
            '',
            'Test Message'
        );

        $result = $emailService->sendEmail();

        $this->assertEquals("Subject is required", $result);
    }

    public function test_send_email_with_empty_message()
    {
        WP_Mock::userFunction( 'wp_mail', [
            'times' => 1,
            'return' => true
        ] );

        $emailService = new EmailService(
            'test@example.com',
            'Test Subject',
            ''
        );

        $result = $emailService->sendEmail();

        $this->assertEquals("Message is required", $result);
    }
}