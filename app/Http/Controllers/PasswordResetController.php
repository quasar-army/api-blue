<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function redirectToPasswordResetPage(Request $request)
    {
        $queryString = $request->getQueryString();
        return redirect(env('APP_URL') . "/password-reset?$queryString");
    }
}
