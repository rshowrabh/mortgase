<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invite;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Str;
use App\Http\Resources\AgentColorResource;
use App\Agent;

class InviteController extends Controller
{



    public function invite()
    {
    }

    public function process(Request $request)
    {
        $user = auth()->user();
        $bid = Agent::where('user_id', $user->id)->first()->broker_id;

        $agent = $user;
        $agent_name = preg_replace('/\s+/', '', $agent->name);

        $broker = User::find($bid)->name;
        $broker_name = preg_replace('/\s+/', '', $broker);

        $url = env('APP_URL')  . $broker_name . '/' . $agent_name;


        Mail::to($request->get('email'))->send(new InviteCreated($url));
        if (Mail::failures()) {
            return response()->json([
                'status'  => false,
                'message' => 'Nnot sending mail.. retry again...'
            ]);
        }
    }

    public function accept($token)
    {
        // Look up the invite


        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        };

        // create the user with the details from the invite

        // User::create(['email' => $invite->email]);

        // delete the invite so it can't be used again
        // $invite->delete();

        // here you would probably log the user in and show them the dashboard, but we'll just prove it worked





        if ($invite->user->lock_logo_color == 0) {
            $agent = $invite->user;
        } else {
            $agent = [];
        }

        return view('client.register')->with('agent', $agent)->with('email', $invite->email);
    }
}
