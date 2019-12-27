<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    
        $this->middleware(function ($request, $next) {
            if(\Auth::user()->role != 1 ){
                return redirect('/');
            }
            return $next($request);
        });

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $user)
    {
        // 
        // dd($user->user());
        // check if admin or redirect 
        return view('home.home');
    }
}
