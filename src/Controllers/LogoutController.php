<?php

namespace WTG\Auth\Controllers;

use Illuminate\Routing\Controller;

/**
 * Class LogoutController
 *
 * @package     WTG\Auth
 * @subpackage  Controllers
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class LogoutController extends Controller
{
    /**
     * LogoutController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Logout the user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogout()
    {
        auth()->logout();
        session()->flush();
        session()->regenerate();

        return redirect('/');
    }
}