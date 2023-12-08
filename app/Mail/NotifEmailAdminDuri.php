<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Surat1;
use App\Surat2BukuTamu;

class NotifEmailAdminDuri extends Mailable
{
    use Queueable, SerializesModels;


    public $surat2;

    public function __construct($surat2)
    {


        $this->surat2 = $surat2;
    }

    public function build()
    {
        return $this->subject('Notifikasi Surat 2')
            ->view('notifadminduri');
    }
}
