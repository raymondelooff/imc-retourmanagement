<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class EmailController extends Controller
{
    public function edit(Request $request)
    {
        return view('account.email.edit');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|email',
            'email_confirmation' => 'required|same:email'
        ]);

        $user = Auth::user();
        $user->update($request->only('email'));

        Flash::success('Uw e-mailadres is bijgewerkt. Er is een e-mail gestuurd met een link om uw e-mailadres te valideren.');

        return redirect('account');
    }
}