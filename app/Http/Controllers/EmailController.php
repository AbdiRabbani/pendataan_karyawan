<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        $mail_data = [
            'recipient' => 'abdirabbani59@gmail.com',
            'fromEmail' => 'abdirabbani59%gmail.com',
            'fromName' => 'Fawaz',
            'subject' => 'Laravel',
        ];

        \Mail::send('emails.index', $mail_data, function($message) use($mail_data){
            $message->to($mail_data['recipient'])
                    ->subject($mail_data['subject']);
        });
        return '<h1>suksess</h1>';
    }
}