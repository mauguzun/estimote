<?php


namespace App\Services;


use App\Entity\User;

class UsersService
{
    /**
     * @param int $userId
     * @return User
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     */
    public function setPasswordResetToken(int $userId): User
    {
        $token = generateTokenKey(25);
        $user = \EntityManager::getRepository(User::class)->find($userId);
        $user->setPasswordResetToken($token);

        \EntityManager::flush($user);

        return $user;
    }
}