<?php
/**
 * Created by PhpStorm.
 * User: endzait
 * Date: 04.08.16
 * Time: 15:26
 */

namespace App\Jobs;


use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Job implements SelfHandling,ShouldQueue
{
    use InteractsWithQueue,SerializesModels;

    protected $user;

    protected $message;

    public function __construct(User $user, $message)
    {
        $this->user=$user;
        $this->message=$message;
    }

    public function handle(Mailer $mailer){
        $mailer->raw($this->message,function($m){
            $m->from(env('MAIL_USERNAME'), 'Your Application');

            $m->to($this->user->email, $this->user->firs_name)->subject('Your Library');
        });
    }
}