<?php

namespace App\Console\Commands;

use App\Entity\UserRole;
use Illuminate\Console\Command;

class ImportAppRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import_roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import basic app acl roles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @throws \Exception*
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     * @throws \LaravelDoctrine\ORM\Facades\ORMInvalidArgumentException
     */
    public function handle()
    {
        $roles = ['ROLE_ADMIN', 'ROLE_AGENT', 'ROLE_USER'];

        foreach ($roles as $role) {
            if (!\EntityManager::getRepository(UserRole::class)->findOneBy(['name' => $role])) {
                $userRoleAdmin = new UserRole('ROLE_ADMIN', 'Full access');
                $userRoleAgent = new UserRole(
                    'ROLE_AGENT',
                    'Can access only allowed parts of application'
                );
                $userRoleUser = new UserRole(
                    'ROLE_USER',
                    'Limited access'
                );

                try{
                    \EntityManager::persist($userRoleAdmin);
                    \EntityManager::persist($userRoleAgent);
                    \EntityManager::persist($userRoleUser);
                    \EntityManager::flush();
                } catch (\Exception $exception) {
                    throw $exception;
                }
            }
        }

        $this->info('Roles successfully generated');
    }
}
