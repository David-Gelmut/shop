<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Mail\ManagerMailer;
use App\Mail\OrderMailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewOrderEmailNotification
{
    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        Mail::to(env('MAIL_MANAGER'))->send(new OrderMailer($event->object));
    }
}
