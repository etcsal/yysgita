<?php

namespace App\Mail;

use App\Models\Kandidat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PemberitahuanKandidat extends Mailable
{
    use Queueable, SerializesModels;

    public $kandidat;
    /**
     * Create a new message instance.
     */
    public function __construct(Kandidat $kandidat)
    {
        $this->kandidat = $kandidat;
    }

    public function build()
    {
        return $this->view('admin.kandidat.index')
                    ->subject('Pendaftaran Kandidat Berhasil')
                    ->with([
                        'bulan' => $this->kandidat->bulan,
                        'tahun' => $this->kandidat->tahun,
                        'nama_kandidat' => $this->kandidat->nama_kandidat,
                        'email' => $this->kandidat->email,
                        'foto_kandidat' => $this->kandidat->foto_kandidat,
                        'pendidikan' => $this->kandidat->pendidikan,
                        'pekerjaan' => $this->kandidat->pekerjaan,
                        'tinggi_badan' => $this->kandidat->tinggi_badan,
                        'berat_badan' => $this->kandidat->berat_badan,
                        'bahasa' => $this->kandidat->bahasa,
                        'kebudayaan' => $this->kandidat->kebudayaan,
                        'musik' => $this->kandidat->musik,
                        'pengetahuan' => $this->kandidat->pengetahuan,
                        'approve' => $this->kandidat->approve,
                    ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pemberitahuan Kandidat',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.kandidat.index',
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
