<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $body = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $body)
    {
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->body;
        return $this->view('email.email',compact('data'))
                    ->subject('Sending Gmail');
    }
}
