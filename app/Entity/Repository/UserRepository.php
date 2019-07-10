<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 18/08/16
 * Time: 15:59
 */

namespace App\Entity\Repository;

use App\Entity\User;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * @param string $email
     * 
     * @return null|User
     */
    public function findByEmail(string $email)
    {
        return $this->findOneBy(['email' => $email]);
    }
    
    /**
     * @param string $role
     * 
     * @return array
     */
    public function findByRole(string $role)
    {
        return $this->createQueryBuilder('u')
            ->leftJoin('u.role', 'role')
            ->where('role.name = :name')
            ->setParameter('name', $role)
            ->getQuery()->getResult();
    }
}