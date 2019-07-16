<?php

namespace App\Http\Controllers\Admin;


use App\Entity\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 'password' => 'required',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postLogin(Request $request)
    {
        $this->validateLogin($request);
        $credentials = $request->only(['email', 'password']);

        /** @var User $user */
        if ($user = \EntityManager::getRepository(User::class)->findOneBy(['email' => $credentials['email']])) {
            if (!$user->isAdmin() && !$user->isAgent()) {
                return \Redirect::route('admin::index');
            }
        }

        if (\Auth::guard('admin')->attempt($credentials)) {
            return \Redirect::route('admin::index');
        }

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'Incorrect Email address',
            ]);
    }

    /**
     * @return mixed
     */
    public function logout()
    {
        \Auth::logout();
        \Session::flush();

        return redirect()->route('admin::showLoginForm');
    }
}