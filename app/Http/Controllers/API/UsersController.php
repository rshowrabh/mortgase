<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Cache;
use App\UserRealtion;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware('auth:api');
    }


    public function index()
    {

        $this->authorize('isAdmin');
        $users = User::whereHas('roles', function ($query) {
            $query->where('id', '!=', 1);
        })
            ->get();
        return  $users;

        return  $users;
    }
    public function agent()
    {


        // $this->authorize('isAdmin');
        $user = auth('api')->user();

        $users = User::whereHas('agent', function ($q) {
            $q->where('broker_id', auth()->user()->id);
        })->with('agent')
            ->get();

        if ($user->isAdmin()) {
            $user = User::whereHas('roles', function ($query) {
                $query->where('id', 2);
            })->with('agent')
                ->get();
            return  $user;
        }

        return  $users;
    }
    public function brokerage()
    {

        // $this->authorize('isAdmin');
        $users = User::whereHas('roles', function ($query) {
            $query->where('id', 4);
        })
            ->get();
        return  $users;
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


        $name = time() . time() . '.' . explode('/', explode(':', substr($request->logo, 0, strpos($request->logo, ';')))[1])[1];

        $name_picture = time() . '.' . explode('/', explode(':', substr($request->picture, 0, strpos($request->picture, ';')))[1])[1];


        \Image::make($request->logo)->save(public_path('/storage/images/' . $name));
        \Image::make($request->picture)->save(public_path('/storage/images/' . $name_picture));

        $input = $request->except('role');
        $input['logo'] = $name;
        $input['picture'] = $name_picture;
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->roles()->attach($request->role);


        UserRealtion::create(['broker_id' => auth()->user()->id, 'agent_id' => $user->id]);


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
            'email' => 'required|string|email|max:191',
            'phone' => 'digits_between:8,15',
        ]);


        if (trim($request->password) == '') {
            $input = $request->except(['password']);
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
        }

        $user->update($input);
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
        $this->authorize('isAdmin');
        User::find($id)->delete();
    }
}
