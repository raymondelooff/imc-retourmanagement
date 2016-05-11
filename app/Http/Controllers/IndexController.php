<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    /**
     * Returns the index view
     *
     * @return mixed The index view
     */
    public function getIndex()
    {
        return view('index');
    }
}