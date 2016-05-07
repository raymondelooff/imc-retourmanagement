<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Returns the index view
     *
     * @return mixed The index view
     */
    public function getIndex()
    {
        $admin = Auth::user()->isAdmin();

        return view('index', compact('admin'));
    }
}