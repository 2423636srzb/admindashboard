<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "AdminDashboard Events",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // dd($this->details['userName'],$this->details['from'],$this->details['subject'],$this->details['message']);
        return new Content(
            view: 'admin.notifications.mail_template',
            with:[
                'name' =>$this->details['userName'],
                'from' =>$this->details['from'],
                'subject' =>$this->details['subject'],
                'messages' =>$this->details['messages']
             ]
        );

    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
