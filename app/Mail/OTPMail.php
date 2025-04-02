<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OTPMail extends Mailable
{
    use Queueable, SerializesModels;
    public $otp;
    public $username;
    public function __construct($otp, $username)
    {
        //
        $this->otp = $otp;
        $this->username = $username;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Kode OTP Anda',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.otp',
            with: ['otp' => $this->otp]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
