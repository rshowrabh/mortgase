<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invite;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Str;
use App\Http\Resources\AgentColorResource;

class InviteController extends Controller
{



    public function invite()
    {
    }

    public function process(Request $request)
    {
        // process the form submission and send the invite by email
        $this->validate($request, [
            'email' => 'required|string|email|max:191|unique:users|unique:invites',
        ]);

        // validate the incoming request data

        do {
            //generate a random string using Laravel's str_random helper
            $token  = Str::random(16);
        } //check if the token already exists and if it does, try again
        while (Invite::where('token', $token)->first());

        //create a new invite record
        $invite = Invite::create([
            'email' => $request->get('email'),
            'token' => $token,
            'user_id' => auth()->user()->id,
        ]);

        // send the email
        Mail::to($request->get('email'))->send(new InviteCreated($invite));
        if (Mail::failures()) {
            return response()->json([
                'status'  => false,
                'message' => 'Nnot sending mail.. retry again...'
            ]);
        }
        return response()->json([
            'status'  => true,
            'message' => 'Your details mailed successfully'
        ]);

        // redirect back where we came from
        return redirect()
            ->back();
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
