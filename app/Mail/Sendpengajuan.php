<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendpengajuan extends Mailable
{
    use Queueable, SerializesModels;

    public $idsurat1;

    public function __construct($idsurat1)
    {
        $this->idsurat1 = $idsurat1;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emailmasuk');
    }
}
