<?php

namespace App\Http\Controllers;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function sendTestEmail(Request $request, $recipientEmail = null)
    {
        // Example: Determine the recipient email dynamically based on conditions or user input
        $recipientEmail = $recipientEmail ?? $this->getRecipientEmail($request);

        // Example: Email content
        $subject = 'Welcome to Found!';
    $body = 'You can always visit our About page to contact the team';

        // Send the email
        Mail::to($recipientEmail)->send(new TestMail($subject, $body));

        // Your response or redirect logic here
        return redirect()->back()->with('message', 'Email sent successfully!');
    }

    private function getRecipientEmail(Request $request)
    {
        // Example: Check if a user is logged in and get their email
        if ($request->user()) {
            return $request->user()->email;
        }

        // Default to a fallback email address if no user is logged in
        return 'fallback@example.com';
    }

}
