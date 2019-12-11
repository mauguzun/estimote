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
use App\Events\UserCreateEvent;
use App\Events\UserPasswordResetEvent;
use App\Policies\RoutePolicy;
use App\Services\InfoService;
use App\Services\UserService;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Sorskod\Larasponse\Larasponse;

class UsersController extends BaseController
{
    private $infoService;

    public function __construct(Larasponse $fractal, InfoService $infoService)
    {
        parent::__construct($fractal);
        $this->infoService = new InfoService();
    }

    protected function getValidationRules($id = null): array
    {
        return [
            'create' => [
                'name' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:App\Entity\User,email',
                'role' => 'required|exists:App\Entity\UserRole,id',
            ],
            'update' => [
                'name' => 'required',
                'lastname' => 'required',
                'role' => 'required|exists:App\Entity\UserRole,id',
            ],
        ];
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|StandRepository
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(User::class);
    }

    public function index() 
    {
        $users = $this->getRepository()->findAll();

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * @param null $userId
     *
     * @return mixed
     * @throws EntityNotFoundException
     */
    public function showForm($userId = null)
    {
        $user = null;

        if ($userId && (!$user = $this->getRepository()->find($userId))) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $userId));
        }

        return view('admin.users.form', [
            'roles' => $this->infoService->get(InfoService::DATA_TYPE_FORM_ROLES),
            'user' => $userId ? $this->getRepository()->find($userId) : null,
        ]);
    }


    /**
     * @param Request $request
     * @param null $userId
     * @return \Illuminate\Http\RedirectResponse
     * @throws EntityNotFoundException
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     * @throws \Illuminate\Validation\ValidationException
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     * @throws \LaravelDoctrine\ORM\Facades\ORMInvalidArgumentException
     * @throws \ReflectionException
     */
    public function postUser(Request $request, $userId = null)
    {
        if (!$userId) {
            $this->validate($request, $this->getValidationRules()['create']);

            $user = new User();
            $user->hydrate($request->all());
            $user->setPasswordResetToken(generateTokenKey());
            \Session::flash('success', 'User was successfully created');
            \EntityManager::persist($user);
            \EntityManager::flush();

            event(new UserCreateEvent($user->getId()));
        } else {
            $this->validate($request, $this->getValidationRules()['update']);

            /** @var User $user */
            $user = $this->getRepository()->find($userId);

            if (!$user) {
                throw new EntityNotFoundException(sprintf('User with id %s not found', $userId));
            }

            $user->hydrate($request->all());

            \Session::flash('success', 'User was successfully updated');
            \EntityManager::flush($user);
        }

        return redirect()->route('admin::user.showForm', ['userId' => $user->getId()]);
    }

    /**
     * @param int $userId
     * @return \Illuminate\Http\RedirectResponse
     * @throws EntityNotFoundException
     */
    public function resetPassword(int $userId)
    {
        /** @var User $user */
        $user = $this->getRepository()->find($userId);

        if (!$user) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $userId));
        }

        event(new UserPasswordResetEvent($userId));
        \Session::flash('success', 'User password was successfully reset');

        return redirect()->back();

    }

    /**
     * @param $userId
     * @return \Illuminate\Http\RedirectResponse
     * @throws EntityNotFoundException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     * @throws \LaravelDoctrine\ORM\Facades\ORMInvalidArgumentException
     */
    public function deleteUser($userId)
    {
        /** @var User $user */
        $user = $this->getRepository()->find($userId);

        if (!$user) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $userId));
        }

        \EntityManager::remove($user);
        \EntityManager::flush();

        \Session::flash('success', 'User was successfully deleted');

        return redirect()->back();
    }
}