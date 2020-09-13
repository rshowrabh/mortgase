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
            })->with('broker')
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
            'picture' => 'required',
            'agent.agent_license_number' => 'required',
        ]);

        if ($request->has('picture')) {
            $name_picture = time()  . $request->email .  '-picture.' .  explode('/', explode(':', substr($request->picture, 0, strpos($request->picture, ';')))[1])[1];
            \Image::make($request->picture)->save(public_path('/storage/images/'  . $name_picture));
        }



        $input = $request->except('role');
        $input['picture'] = $name_picture;
        $input['password'] = Hash::make($input['password']);

        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->picture = $input['picture'];
        $user->password = $input['password'];
        $user->phone = $input['phone'];


        if ($user->save()) {
            $agent = $user->agent()->firstOrNew([]);
            $agent->agent_license_number = $input['agent']['agent_license_number'];

            if ($request->has('agent.broker_id')) {
                $agent->broker_id = $input['agent']['broker_id'];
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

        // $this->authorize('isAdmin');

        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'phone' => 'digits_between:8,15',
        ]);

        $input = $request->all();

        $user = User::find($input['id']);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];



        if (trim($request->password) !== '') {
            $user->password = Hash::make($input['password']);
        }


        if (strlen($request->picture) > 100) {

            $input['picture'] = time() . '.' . explode('/', explode(':', substr($request->picture, 0, strpos($request->picture, ';')))[1])[1];


            \Image::make($request->picture)->save(public_path('/storage/images/' . $input['picture']));

            $user->picture = $input['picture'];
        }




        if ($user->save()) {
            $agent = $user->agent()->firstOrNew([]);
            $agent->agent_license_number = $input['agent']['agent_license_number'];
            $agent->broker_id = $input['agent']['broker_id'];
            $agent->save();
        }


        $user->save();




        return $request->all();
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
