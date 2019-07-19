<?php


namespace App\Listeners;


use App\Entity\User;
use App\Events\UserCreateEvent;
use App\Events\UserPasswordResetEvent;

class UserPasswordResetSubscriber
{

    public function handleUserCreate(UserCreateEvent $event)
    {

    }
    
    public function handlePasswordReset(UserPasswordResetEvent $event)
    {

    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(UserCreateEvent::class, static::class . '@handleUserCreate');
        $events->listen(UserPasswordResetEvent::class, static::class . '@handlePasswordReset');
    }
}