<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * account activation
     *
     * @return \Illuminate\View\View
     */

    public function activateUser($code)
    {
        $user = User::where('activation_code', $code)->first();
        if (!$user) {
            return view('activation-error');
        }
        $user->activation_code = null;
        $user->activation_status = 1;
        $user->save();
        return view('activation-success', compact('user'));
    }
}
