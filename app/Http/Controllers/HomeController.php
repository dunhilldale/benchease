<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->type === User::TYPE_ADMIN) {
            $grants = [
                'personal_access' => Client::get_personal_access_client()->first(),
                'password_grant' => Client::get_password_grant_client()->first(),
            ];              
            return view('home', compact('grants'));
        }

        return view('home');
    }

    public function clients(Request $request)
    {
        $clients = $request->user()->clients;
        return view('clients', compact('clients'));
    }

    public function users(Request $request)
    {
        $users = $this->users->get_users( type: 'employee', status: true );
        return view('users', compact('users'));
    }

    public function user_clients(Request $request)
    {
        $clients = $request->user()->clients;
        return view('user_clients', compact('clients'));
    }
}
