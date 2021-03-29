<?php

namespace App\Mail\Organization;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrganizationImportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->markdown('emails.organization.import')
            ->subject('Finished importing Organizations');
    }
}
