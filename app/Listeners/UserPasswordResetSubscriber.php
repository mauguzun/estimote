<?php


namespace App\Listeners;


use App\Entity\User;
use App\Events\UserCreateEvent;
use App\Events\UserPasswordResetEvent;
use App\Notifications\AdminPasswordResetNotification;
use App\Notifications\AdminWelcomeNotification;
use App\Services\UsersService;

class UserPasswordResetSubscriber
{

    /** @var UsersService $userService */
    private $userService;

    public function __construct(UsersService  $usersService)
    {
        $this->userService = $usersService;
    }

    /**
     * @param UserCreateEvent $event
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     */
    public function handleUserCreate(UserCreateEvent $event)
    {
        $user = $this->userService->setPasswordResetToken($event->userId);
        $user->notify(new AdminWelcomeNotification($user));
    }

    /**
     * @param UserPasswordResetEvent $event
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     */
    public function handlePasswordReset(UserPasswordResetEvent $event)
    {
        $user = $this->userService->setPasswordResetToken($event->userId);
        $user->notify(new AdminPasswordResetNotification($user));
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

    /**
     * @param int $userId
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     */
    private function setUserPasswordResetToken(int $userId)
    {

    }
}