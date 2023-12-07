<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductQuote extends Mailable
{
    use Queueable, SerializesModels;

    public $productQuote,$productName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($productQuote,$productName)
    {
        $this->productQuote    =   $productQuote;
        $this->productName     =   $productName;
    }

    public function build() {
        return $this
              ->subject("Product Quote [{$this->productQuote->name}]")
              ->markdown('emails.productQuote');
  }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */


    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */


    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
