<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\UserRealtion;
use App\Agent;
use App\User;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->isClient()) {
            $uid = auth()->user()->id;

            $a_id =  UserRealtion::where('client_id', $uid)->first()->agent_id;
            $b_id = Agent::where('user_id', $a_id)->first()->broker_id;

            $bid = User::where("id", $b_id)->with('broker')->first();
            $aid = User::where("id", $a_id)->with('agent')->first();



            // $bid = User::with('broker')->where('id', $b_id)->get();
            // $aid = User::with('agent')->where('id', $a_id)->get();

            return view('client.welcome.index', compact('bid', 'aid'));
        }
        return view('home');
    }
}
