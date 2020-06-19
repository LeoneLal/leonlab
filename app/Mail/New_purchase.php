<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class New_purchase extends Mailable
{
    use Queueable, SerializesModels;

    
    public $codes;
    public $facture;

    public function __construct($codes, $facture)
    {
        $this->codes = $codes;
        $this->facture = $facture;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $facture = $this->facture;
        return $this->subject('Nouvel achat chez LeonLab')
                    ->attach(public_path('/factures/') .$facture)
                    ->view('mails.purchase');
    }
}
