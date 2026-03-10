<?php

namespace App\Mail;

use App\Models\EmailLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailOpened extends Mailable
{
    use Queueable, SerializesModels;

    public $emailLog;

    public function __construct(EmailLog $emailLog)
    {
        $this->emailLog = $emailLog;
    }

    public function build()
    {
        $trackingUrl = route('track.email.open', ['emailLog' => $this->emailLog->id]);

        return $this->markdown('emails.email-opened')
                    ->with([
                        'emailLog' => $this->emailLog,
                        'trackingUrl' => $trackingUrl,
                    ]);
    }
}
