<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TransactionalEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Send an email.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmail(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'to' => 'required|email',
            'recipientName' => 'required|string',
            'introText' => 'required|string',
            'mainOfferTitle' => 'required|string',
            'mainOfferDetails' => 'required|string',
            'additionalDetails' => 'required|string',
            'ctaLink' => 'required|url',
            'ctaText' => 'required|string',
            'closingText' => 'required|string',
            'senderName' => 'required|string',
            'senderTitle' => 'required|string',
            'senderContact' => 'required|string',
            'psText' => 'required|string',
            'companyName' => 'required|string',
            'companyAddress' => 'required|string',
            'unsubscribeLink' => 'required|url',
            'socialMediaLinks' => 'required|string'
        ], [
            'required' => 'The :attribute field is required.',
            'email' => 'Please provide a valid email address.',
            'url' => 'The :attribute field must be a valid URL.',
            'string' => 'The :attribute field must be a string.'
        ]);
    
        try {
            // Send the email
            Mail::to($validatedData['to'])->send(new TransactionalEmail($validatedData));            
            // Return success response
            return response()->json(['message' => 'Email sent successfully'], 200);
        } catch (\Exception $e) {
            // Return error response
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
