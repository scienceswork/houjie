<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Jrean\UserVerification\Facades\UserVerification;

class SendActivateMail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     *
     * SendActivateMail constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * 发送激活邮件
     * @param Mailer $mailer
     */
    public function handle(Mailer $mailer)
    {
        $user = $this->user;
        $mailer->send('emails.reminder', ['user' => $user], function($message) use ($user){
            $message->to($user->email)->subject('新功能发布');
        });
    }
}
