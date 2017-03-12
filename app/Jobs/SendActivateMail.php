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
     */
    public function handle()
    {
        sendActivateMail($this->user);
    }
}
