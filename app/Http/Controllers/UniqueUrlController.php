<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\User;
use Cookie;

class UniqueUrlController extends Controller
{


    public function url()
    {
        $user = auth('api')->user();
        $bid = Agent::where('user_id', $user->id)->first()->broker_id;

        $agent = $user;
        $agent_name = preg_replace('/\s+/', '', $agent->name);

        $broker = User::find($bid)->name;
        $broker_name = preg_replace('/\s+/', '', $broker);





        return response()->json([$broker_name . "/" . $agent_name]);
    }

    public function index($broker, $agent)
    {
        $bid = User::whereRaw("REPLACE(`name`, ' ' ,'')  = ?", $broker)->with('broker')->first();
        $aid = User::whereRaw("REPLACE(`name`, ' ' ,'')  = ?", $agent)->with('agent')->first();

        // $agent = User::where
        return view('client.register', compact('bid', 'aid'));
    }
}
