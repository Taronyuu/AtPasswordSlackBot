<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{

    /**
     * index function.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * privacyPolicy function.
     *
     * @return \Illuminate\View\View
     */
    public function privacyPolicy()
    {
        return view('privacy-policy');
    }
}
