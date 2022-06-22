<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\SiteConfigurations;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $site_configurations = SiteConfigurations::find(1);

        return $this->view('emails.contact_email')
            ->to($site_configurations->email)
            ->subject($this->user['subject'] . config('app.name'))
            ->with([
                'user' => $this->user,
            ]);
    }
}
