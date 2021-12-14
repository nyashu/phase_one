<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verify()
    {
        return view('verify');
    }



    public function verification(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/welcome');
    }
}
