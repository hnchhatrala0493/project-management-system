<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Mailable {
    use Queueable, SerializesModels;

    /**
    * Create a new message instance.
    *
    * @return void
    */

    public function __construct() {
        //
    }

    /**
    * Build the message.
    *
    * @return $this
    */

    public function build() {

        return $this->view( 'view.name' );
    }

    public static function SendEmail($emailTemplate,$data,$email,$name,$subject) {
        Mail::send($emailTemplate,$data,function($message) use ( $email, $name, $subject) {
            $message->to($email, $name)
            ->subject(env('APP_NAME').' - '. $subject);
            $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
        });
    }
}