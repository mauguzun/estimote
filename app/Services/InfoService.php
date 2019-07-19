<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 12/12/2016
 * Time: 14:45
 */

namespace App\Services;


use App\Entity\UserRole;

class InfoService
{
    const DATA_TYPE_FORM_ROLES = 'roles';
    const DATA_TYPE_PAGE_FORM_YEARS_RANGE = 'years_range';


    /**
     * @param string $dataType
     * @param int|null $id
     *
     * @return array
     */
    public function get(string $dataType, int $id = null): array
    {
        switch ($dataType) {
            case static::DATA_TYPE_FORM_ROLES:
                return $this->formRoles();
                break;
            case static::DATA_TYPE_PAGE_FORM_YEARS_RANGE:
                return $this->getYearsRange();
                break;

        }

        return [];
    }

    private function formRoles(): array
    {
        $roles = [];

        /** @var UserRole $role */
        foreach (\EntityManager::getRepository(UserRole::class)->findAll() as $role) {
            $roles[$role->getId()] = $role->getName();
        }

        return $roles;
    }

    public function getYearsRange(int $range = 9)
    {
        $range = range(date('Y'), date('Y') - $range);
        $years = array_combine($range, $range);

        return $years;
    }
}