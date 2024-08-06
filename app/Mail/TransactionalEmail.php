<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionalEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $recipientName;
    public $introText;
    public $mainOfferTitle;
    public $mainOfferDetails;
    public $additionalDetails;
    public $ctaLink;
    public $ctaText;
    public $closingText;
    public $senderName;
    public $senderTitle;
    public $senderContact;
    public $psText;
    public $companyName;
    public $companyAddress;
    public $unsubscribeLink;
    public $socialMediaLinks;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->recipientName = $data['recipientName'];
        $this->introText = $data['introText'];
        $this->mainOfferTitle = $data['mainOfferTitle'];
        $this->mainOfferDetails = $data['mainOfferDetails'];
        $this->additionalDetails = $data['additionalDetails'];
        $this->ctaLink = $data['ctaLink'];
        $this->ctaText = $data['ctaText'];
        $this->closingText = $data['closingText'];
        $this->senderName = $data['senderName'];
        $this->senderTitle = $data['senderTitle'];
        $this->senderContact = $data['senderContact'];
        $this->psText = $data['psText'];
        $this->companyName = $data['companyName'];
        $this->companyAddress = $data['companyAddress'];
        $this->unsubscribeLink = $data['unsubscribeLink'];
        $this->socialMediaLinks = $data['socialMediaLinks'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Marketing Email')
                    ->view('emails.marketing');
    }
}
