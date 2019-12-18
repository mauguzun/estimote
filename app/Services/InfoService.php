<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 12/12/2016
 * Time: 14:45
 */

namespace App\Services;


use App\Entity\Aircraft;
use App\Entity\Device;
use App\Entity\Stand;
use App\Entity\Apron;
use App\Entity\Status;
use App\Entity\UserRole;
use App\Http\Controllers\Admin\StandsController;

class InfoService
{
    const DATA_TYPE_FORM_ROLES = 'roles';
    const DATA_TYPE_PAGE_FORM_YEARS_RANGE = 'years_range';
    const DATA_TYPE_FORM_AIRCRAFTS = 'aircrafts';
    const DATA_TYPE_FORM_STANDS = 'stands';
    const DATA_TYPE_FORM_STATUS = 'status';
    const DATA_TYPE_FORM_APRONS = 'aprons';
    const DATA_TYPE_FORM_DEVICES = 'devices';

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
            case static::DATA_TYPE_FORM_AIRCRAFTS:
                return $this->getArrayFromObject(Aircraft::class, 'getId', 'getAcReg');
            case static::DATA_TYPE_FORM_STANDS:
                return $this->getArrayFromObject(Stand::class, 'getId', 'getName');
            case static::DATA_TYPE_FORM_STATUS:
                return $this->getArrayFromObject(Status::class, 'getId', 'getStatus');
            case static::DATA_TYPE_FORM_APRONS:
                return $this->getArrayFromObject(Apron::class, 'getId', 'getTitle');
 case static::DATA_TYPE_FORM_APRONS:
                return $this->getArrayFromObject(Device::class, 'getId', 'getId');


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

    /**
     * @param string $className
     * @param string $valueGetterName
     * @param string $textGetterName
     * @return array
     */
    function getArrayFromObject(string $className, string $valueGetterName, string $textGetterName): array
    {
        $return = [];

        foreach (\EntityManager::getRepository($className)->findAll() as $instance) {
            $return[call_user_func([$instance, $valueGetterName])] = call_user_func([$instance, $textGetterName]);
        }
        return $return;
    }
}