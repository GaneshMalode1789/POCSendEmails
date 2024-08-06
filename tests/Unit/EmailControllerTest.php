<?php

namespace Tests\Unit;

use App\Http\Controllers\EmailController;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\TransactionalEmail;
use Illuminate\Validation\ValidationException;

class EmailControllerTest extends TestCase
{
    public function test_send_email_success()
    {
        // Mock the Mail facade
        Mail::fake();

        // Create a request with valid data
        $request = Request::create('/send-email', 'POST', [
            'to' => 'test@example.com',
            'recipientName' => 'John Doe',
            'introText' => 'Welcome to our service!',
            'mainOfferTitle' => 'Special Offer',
            'mainOfferDetails' => 'Get 50% off on your first purchase.',
            'additionalDetails' => 'Limited time offer.',
            'ctaLink' => 'https://example.com',
            'ctaText' => 'Shop Now',
            'closingText' => 'Best regards,',
            'senderName' => 'Jane Smith',
            'senderTitle' => 'Marketing Manager',
            'senderContact' => 'jane.smith@example.com',
            'psText' => 'P.S. Don\'t miss out!',
            'companyName' => 'Example Inc.',
            'companyAddress' => '123 Example Street, Example City, EX 12345',
            'unsubscribeLink' => 'https://example.com/unsubscribe',
            'socialMediaLinks' => 'Facebook | Twitter | Instagram'
        ]);

        // Call the controller method
        $response = (new EmailController)->sendEmail($request);

        // Assert the response
        $this->assertEquals(200, $response->status());
        $this->assertEquals(['message' => 'Email sent successfully'], $response->getData(true));

        // Assert that the email was sent
        Mail::assertSent(TransactionalEmail::class, function ($mail) use ($request) {
            return $mail->hasTo($request->input('to'));
        });
    }
    public function test_send_email_validation_error()
    {
        // Create a request with invalid data
        $request = Request::create('/send-email', 'POST', [
            'to' => 'invalid-email',
            'recipientName' => '',
            'introText' => '',
            'mainOfferTitle' => '',
            'mainOfferDetails' => '',
            'additionalDetails' => '',
            'ctaLink' => 'invalid-url',
            'ctaText' => '',
            'closingText' => '',
            'senderName' => '',
            'senderTitle' => '',
            'senderContact' => '',
            'psText' => '',
            'companyName' => '',
            'companyAddress' => '',
            'unsubscribeLink' => 'invalid-url',
            'socialMediaLinks' => ''
        ]);

        // Call the controller method and catch the exception
        try {
            (new EmailController)->sendEmail($request);
        } catch (ValidationException $e) {
            // Laravel might not always attach a response to the ValidationException
            // so we need to create a response from the validator instance

            $validator = $e->validator;
            $response = response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors()
            ], 422);

            // Assert that the response status is 422
            $this->assertEquals(422, $response->status());

            // Assert that the response contains errors
            $data = $response->getData(true);
            $this->assertArrayHasKey('errors', $data);
            return;
        }

        // Fail the test if the exception was not thrown
        $this->fail('Expected ValidationException was not thrown.');
    }
}