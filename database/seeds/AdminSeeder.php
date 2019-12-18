<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * @throws Exception
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     * @throws \LaravelDoctrine\ORM\Facades\ORMInvalidArgumentException
     */
    public function run()
    {
        /** @var \App\Entity\User $admin */
        $admin = \EntityManager::getRepository(\App\Entity\User::class)->findOneBy([
            'email' => 'admin@aslairlines.be'
        ]);

        if ($admin == null) {
            $admin = new \App\Entity\User();

        }

        $admin->setEmail('admin@aslairlines.be');
        $admin->setName('Root');
        $admin->setLastname('Admin');
        $admin->setPassword('aslairlines2018');

        $role = \EntityManager::getRepository(\App\Entity\UserRole::class)->findOneBy([
            'name' => \App\Entity\UserRole::ROLE_ADMIN
        ]);

        if ($role == null) {
            $msg = "Please import roles before seed admins
             you can do by console commnad \"php artisan app:import_roles\"";
            throw new Exception($msg);
        }

        $admin->setRole($role);

        \EntityManager::persist($admin);
        \EntityManager::flush();

        $admin = new \App\Entity\User();

        $admin->setEmail('user@aslairlines.be');
        $admin->setName('Driver');
        $admin->setLastname('Driver');
        $admin->setPassword('aslairlines2018');
        $role = \EntityManager::getRepository(\App\Entity\UserRole::class)->findOneBy([
            'name' => \App\Entity\UserRole::ROLE_USER
        ]);
        $admin->setRole($role);

        \EntityManager::persist($admin);
        \EntityManager::flush();
    }
}
