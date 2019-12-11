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
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Http\Request;

class PasswordController extends BaseController
{

    protected function getValidationRules($id = null): array
    {
        return [
            'password' => 'required|min:6',
            'passwordConfirm' => 'required|same:password'
        ];
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|StandRepository
     */
    protected function getRepository()
    {
        return \EntityManager::getRepository(User::class);
    }

    /**
     * @param string $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function showPasswordResetForm(string $token)
    {
        $user = $this->getRepository()->findByPasswordToken($token);

        if ($user == null) {
            throw new \Exception("Your token is either expired or not valid anymore");
        }

        return view('admin.password.resetForm', ['user' => $user]);
    }

    /**
     * @param Request $request
     * @param int $userId
     * @return \Illuminate\Http\RedirectResponse
     * @throws EntityNotFoundException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Illuminate\Validation\ValidationException
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     */
    public function postPasswordReset(Request $request, int $userId)
    {
        /** @var User $user */
        $user = $this->getRepository()->find($userId);

        if ($user == null) {
            throw new EntityNotFoundException(sprintf('User with id %s not found', $userId));
        }

        $this->validate($request, $this->getValidationRules());

        $user->setPassword($request->get('password'));
        $user->setPasswordResetToken(null);

        \EntityManager::flush($user);
        \Session::flash('success', 'Your password was successfully updated you can now login to the system');

        return redirect()->route('admin::showLoginForm');

    }
}