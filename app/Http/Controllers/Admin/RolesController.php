<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 08/12/2016
 * Time: 14:07
 */

namespace App\Http\Controllers\Admin;


use App\Entity\Repository\StandRepository;
use App\Entity\User;
use App\Entity\Country;
use App\Entity\UserRole;
use App\Entity\UserRolePermission;
use App\Policies\RoutePolicy;
use App\Services\InfoService;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RolesController extends BaseController
{
    protected function getValidationRules($id = null): array
    {
        return [
            'name' => 'required|unique:App\Entity\UserRole,name,' . $id ?? '',
            'description' => 'required'
        ];
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|UserRole
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(UserRole::class);
    }

    protected function setBreadCrumbs($id = null): array
    {
        // TODO: Implement setBreadCrumbs() method.
    }

    public function index() 
    {
        $roles = $this->getRepository()->findAll();

        return view('admin.roles.index', ['roles' => $roles]);
    }

    /**
     * @param $roleId $userId
     *
     * @return mixed
     * @throws EntityNotFoundException
     */
    public function showForm($roleId = null)
    {
        $user = null;

        if ($roleId && (!$roleId = $this->getRepository()->find($roleId))) {
            throw new EntityNotFoundException(sprintf('Role with id %s not found', $roleId));
        }

        return view('admin.roles.form', [
            'role' => $roleId ? $this->getRepository()->find($roleId) : null
        ]);
    }

    /**
     * @param Request $request
     * @param null $roleId
     * @return \Illuminate\Http\RedirectResponse
     * @throws EntityNotFoundException
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Illuminate\Validation\ValidationException
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     * @throws \LaravelDoctrine\ORM\Facades\ORMInvalidArgumentException
     * @throws \ReflectionException
     */
    public function postRole(Request $request, $roleId = null)
    {
        if (!$roleId) {
            $this->validate($request, $this->getValidationRules());

            $role = new UserRole($request->get('name'), $request->get('description'));


            \Session::flash('success', 'Role was successfully created');
            \EntityManager::persist($role);
            \EntityManager::flush();
        } else {
            /** @var UserRole $role */
            $role = $this->getRepository()->find($roleId);

            if (!$role) {
                throw new EntityNotFoundException(sprintf('Role with id %s not found', $roleId));
            }

            $this->validate($request, $this->getValidationRules($role->getId()));

            $role->hydrate($request->all());
            \Session::flash('success', 'Role was successfully updated');
            \EntityManager::flush($role);
        }

        return redirect()->route('admin::role.showForm', ['roleId' => $role->getId()]);
    }

    /**
     * @param $roleId
     * @return \Illuminate\Http\RedirectResponse
     * @throws EntityNotFoundException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     * @throws \LaravelDoctrine\ORM\Facades\ORMInvalidArgumentException
     */
    public function deleteRole($roleId)
    {
        /** @var UserRole $role */
        $role = $this->getRepository()->find($roleId);

        if (!$role) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $roleId));
        }

        if($role->isRoot()) {
            throw new \Exception('You cannot delete admin role');
        }

        /** @var UserRolePermission $permission */
        foreach ($role->getPermissions() as $permission) {
            $role->removePermission($permission);
        }

        \EntityManager::remove($role);
        \EntityManager::flush();

        \Session::flash('success', 'User was successfully deleted');

        return redirect()->back();
    }

    /**
     * @param $roleId
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function editRolePermissions($roleId)
    {
        /** @var UserRole $role */
        if (null === ($role = $this->getRepository()->find($roleId))) {
            throw new \Exception(sprintf('Role with (%s) not found'), $roleId);
        }

        return view('admin.roles.editPermissions', [
            'role' => $role,
            'availablePermissions' => RoutePolicy::getAvailablePermissions()
        ]);
    }

    /**
     * @param $roleId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     */
    public function postRolePermissions($roleId)
    {
        /** @var UserRole $role */
        if (null === ($role = $this->getRepository()->find($roleId))) {
            throw new \Exception(sprintf('Role with (%s) not found'), $roleId);
        }

        foreach (array_keys(RoutePolicy::getAvailablePermissions()) as $permission) {
            if (\Request::get(str_replace('.', '_', $permission), false)) {
                $role->addPermission($permission);
            } else {
                /** @var UserRolePermission $rolePermission */
                $rolePermission = \EntityManager::getRepository(UserRolePermission::class)->findOneBy(
                    ['role' => $role, 'name' => $permission]
                );

                if ($rolePermission) {
                    $role->removePermission($rolePermission);
                }
            }
        }

        \EntityManager::flush();
        \Session::flash('success', "Permissions saved");
        
        return redirect(route('admin::role.edit.permissions', ['roleId' => $roleId]));
    }
}