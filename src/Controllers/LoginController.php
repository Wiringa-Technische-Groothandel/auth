<?php

namespace WTG\Auth\Controllers;

use Illuminate\Routing\Controller;
use WTG\Auth\Requests\LoginRequest;
use WTG\Customer\Interfaces\CompanyInterface;

/**
 * Login controller.
 *
 * @package     WTG\Auth
 * @subpackage  Controllers
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class LoginController extends Controller
{
    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Login page.
     *
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return view('auth::login');
    }

    /**
     * Attempt to login
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $company = app()->make(CompanyInterface::class)
            ->where('customer_number', $request->input('company'))
            ->first();

        if ($company === null) {
            return $this->failedAuthentication();
        }

        $login_data = [
            'company_id' => $company->getId(),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'active' => true
        ];

        if (!$this->attemptLogin($login_data, $request->input('remember', false))) {
            return $this->failedAuthentication();
        }

        return $this->successAuthentication($company);
    }

    /**
     * Login failed handler
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function failedAuthentication()
    {
        \Log::info("[Login] Customer '".request('company')."' - '".request('username')."' failed to login");

        return back()
            ->withErrors(trans("auth::login.failed"));
    }

    /**
     * Login success handler
     *
     * @param  CompanyInterface  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function successAuthentication(CompanyInterface $company)
    {
        \Log::info("[Login] Customer '".request('company')."' - '".request('username')."' has logged in");

        return redirect()
            ->intended(url()->previous())
            ->with('status', trans('auth::login.success', ['company' => $company->getName()]));
    }

    /**
     * Attempt the login
     *
     * @param  array  $data
     * @param  bool  $remember
     * @return bool
     */
    protected function attemptLogin(array $data, bool $remember = false)
    {
        return \Auth::attempt($data, $remember);
    }
}