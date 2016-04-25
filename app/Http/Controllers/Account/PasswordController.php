<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class PasswordController extends Controller
{
    public function edit(Request $request)
    {
        return view('account.password.edit');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'password_current' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $credentials = $request->only(
            'password'
        );

        $user = Auth::user();
        $user->password = bcrypt($credentials['password']);
        $user->save();

        Flash::success('Uw wachtwoord is bijgewerkt.');

        return redirect('account');
    }
}