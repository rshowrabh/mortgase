<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AgentColorResource;
use App\Http\Resources\AgentResource;
use App\Invite;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $user = auth('api')->user();
        return new AgentResource($user);
    }

    public function getAgentData()
    {
        $id = auth('api')->user()->id;

        $invite = Invite::where('token', $id)->first();

        $agent = $invite->user;

        return new AgentColorResource($agent);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'email' => 'required',
            'phone' => 'required|digits_between:8,15',
            'password' => 'numeric|min:8',
        ]);

        $user = auth('api')->user();
        if (trim($request->password) == '') {
            $input = $request->except(['password', 'roles']);
        } else {
            $input = $request->except('roles');
            $input['password'] = bcrypt($input['password']);
        }

        $user->update($input);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
