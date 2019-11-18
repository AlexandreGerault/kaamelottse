<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactResponse extends Mailable
{
    use Queueable, SerializesModels;

    public $response;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $response)
    {
        $this->response = $response;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))->view('mails.contact.response');
    }
}
