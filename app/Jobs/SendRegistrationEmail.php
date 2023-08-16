<?php

namespace App\Jobs;

use App\Mail\RegistrationMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRegistrationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user, public $transaction)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $mailData = [
            'title' => 'New CBCA Membership Registration',
            'membership' => $this->transaction,
            'user' => [
                'name'=> $this->user->name,
            ]
        ];

        Mail::to($this->user->email)->send(new RegistrationMail($mailData));

    }
}
