<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        public User $users
    )
    {
        $this->users = new User();
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard () 
    {
        return view('dashboard');
    }

    public function clients(Request $request)
    {
        $clients = $request->user()->clients;
        return view('clients', compact('clients'));
    }

    public function users(Request $request)
    {
        $users = $this->users->get_users( type: 'employee', status: true );
        // dd($users);
        return view('users', compact('users'));
    }

    public function user_clients(Request $request)
    {
        $clients = $request->user()->clients;
        return view('user_clients', compact('clients'));
    }
}
