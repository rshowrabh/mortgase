<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Resources\AgentColorResource;
use App\Http\Resources\AgentResource;
use App\Invite;
use App\User;

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


    public function getBroker()
    {

        $user = auth('api')->user();

        if ($user->isAdmin()) {

            $users = User::whereHas('roles', function ($query) {
                $query->where('id', 4);
            })->select('name', 'id')
                ->get();
            return  $users;
        }

        return null;
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



        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|min:8',
            'phone' => 'digits_between:8,15',
        ]);

        if ($request->has('picture')) {
            $name_picture = time() . '.' . explode('/', explode(':', substr($request->picture, 0, strpos($request->picture, ';')))[1])[1];
        }

        \Image::make($request->picture)->save(public_path('/storage/images/' . $name_picture));

        $input = $request->except('role');
        $input['picture'] = $name_picture;
        $input['password'] = Hash::make($input['password']);

        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->picture = $input['picture'];
        $user->password = $input['password'];


        if ($user->save()) {
            $agent = $user->agent()->firstOrNew([]);
            $agent->agent_license_number = $input['agent_license_number'];

            if ($request->has('broker')) {
                $agent->broker_id = $request->broker;
            } else {
                $agent->broker_id = auth('api')->user()->id;
            }

            $agent->save();

            $user->roles()->attach(2);
        }




        return response()->json($user);
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
