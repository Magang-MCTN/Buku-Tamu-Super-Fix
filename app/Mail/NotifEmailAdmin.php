<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Surat1;
use App\Surat2BukuTamu;

class NotifEmailAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $surat1;
    public $surat2;

    public function __construct($surat1, $surat2)
    {
        $this->surat1 = $surat1;

        $this->surat2 = $surat2;
    }

    public function build()
    {
        return $this->subject('Notifikasi Surat 2')
            ->view('notifadmin');
    }
}
