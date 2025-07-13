<?php
namespace App\Listeners;

use App\Events\ContactRequestEvent;
use App\Mail\PropertyContactMail;
use Illuminate\Events\Dispatcher;
use Illuminate\Mail\Mailer;

class ContactEventSubscriber
{
public function __construct(private Mailer $mailer){

}
    public function sendEmailForContact(ContactRequestEvent $event)
    {
       sleep(2);
        $this->mailer->send(new PropertyContactMail($event->property, $event->data));
    }

    public function subscribe(Dispatcher $dispatcher)
    {
        
        $dispatcher->listen(
            ContactRequestEvent::class,
            [ContactEventSubscriber::class,'sendEmailForContact']
        );
    }
}