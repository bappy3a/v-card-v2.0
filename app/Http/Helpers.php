<?php

use App\Mail\MailSend;
use Illuminate\Support\Facades\Mail;

function mailSend($subject,$message,$to)
{
    $array['view'] = 'emails.template';
    $array['subject'] = $subject;
    $array['from'] = env('MAIL_USERNAME');
    $array['content'] = $message;
    if(env('MAIL_USERNAME') != null && env('MAIL_PASSWORD') != null){
        Mail::to($to)->queue(new MailSend($array));
    }
    return 'ok';
}


?>