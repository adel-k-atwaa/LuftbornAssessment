<?php

namespace App\Jobs;

use App\Mail\SimpleMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private Collection $users;
    private Mailable $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Collection $users)
    {
        $this->users = $users;
        //TODO should be changed to be implemented by factory method design pattern
        $this->email = new SimpleMail();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->users->map(function($user){
            return $user->email;
        }))->queue($this->email);
    }
}
