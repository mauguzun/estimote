<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 18/08/16
 * Time: 15:59
 */

namespace App\Entity\Repository;

use App\Entity\User;
use App\Entity\UserRolePermission;
use Doctrine\ORM\EntityRepository;

class UserRolePermissionRepository extends EntityRepository
{
    /**
     * @param string $name
     * 
     * @return null|UserRolePermission
     */
    public function findByName(string $name)
    {
        return $this->findOneBy(['name' => $name]);
    }
}