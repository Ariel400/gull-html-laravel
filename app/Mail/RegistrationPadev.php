<?php

namespace App\Mail;

use App\Models\Padev;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationPadev extends Mailable
{
    use Queueable, SerializesModels;

    protected Padev $padev;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Padev $padev)
    {
        $this->padev = $padev;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $maildata = [
            'name' => $this->padev->nom . ' ' . $this->padev->prenoms
        ];

        return $this->markdown('emails.registration.padev')
            ->with('maildata', $maildata);
    }
}
