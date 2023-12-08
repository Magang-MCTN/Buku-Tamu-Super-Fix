<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IzinMasukTamu extends Mailable
{
    use Queueable, SerializesModels;
    public $surat1_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($surat1_id)
    {
        $this->surat1_id = $surat1_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('approvedpicjkt');
    }
}
