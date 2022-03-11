<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\AuthRouteMethods;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        // Controllo per utenti loggati
        // dump(Auth::check());

        // if (Auth::check()) {
            // dd(Auth::user());
        // }
        return view('welcome');
    }
}
