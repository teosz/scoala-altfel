<?php
namespace App\Jobs;

use App\Invite;
use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInviteEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $invite;

    /**
     * Create a new job instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(Invite $invite)
    {
        $this->invite = $invite;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $invite = $this->invite;
        $mailer->send('emails.invite', ['invite' => $invite], function ($m) use ($invite) {
            $m->from('no-replay@scoala-altfel.com', 'E-ScoalaAltfel Bot');
            $m->to($this->invite->email)->subject('Invitation to join E-ScoalaAltfel!');
        });
    }
}
