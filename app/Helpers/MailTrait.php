<?php namespace App\Helpers;

use Illuminate\Support\Facades\Mail;

trait MailTrait {

    public function sendMail($template, $data, $mailTo, $nameTo, $mailFrom, $subject){
        Mail::send($template, compact('data'), function($message) use ($mailTo, $nameTo, $mailFrom, $subject){
            $message->to($mailTo, $nameTo)->from($mailFrom)->subject($subject);
        });
    }
}

