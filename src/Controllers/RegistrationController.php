<?php

namespace WTG\Auth\Controllers;

use Illuminate\Routing\Controller;

/**
 * Registration Controller.
 *
 * @package     WTG\Auth
 * @subpackage  Controllers
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class RegistrationController extends Controller
{
    /**
     * Registration page.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('auth::register');
    }
}