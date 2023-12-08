<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class aprovedadmin extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $pdfPath;

    public function __construct($id, $pdfPath)
    {
        $this->id = $id;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->subject('Izin Masuk Tamu PT PLN MCTN')
            ->view('approvedadmin') // Sesuaikan dengan nama template email
            ->attach($this->pdfPath, [
                'as' => 'surat.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
