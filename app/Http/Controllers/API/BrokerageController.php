<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class BrokerageController extends Controller
{



    public function index()
    {
        $user = User::whereHas('broker')->with('broker')->get();

        return $user;
    }




    public function store(Request $request)
    {


        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|min:8',
            'phone' => 'digits_between:8,15',
        ]);

        if ($request->has('logo')) {
            $name = time() . time() . '.' . explode('/', explode(':', substr($request->logo, 0, strpos($request->logo, ';')))[1])[1];
        }
        if ($request->has('picture')) {
            $name_picture = time() . '.' . explode('/', explode(':', substr($request->picture, 0, strpos($request->picture, ';')))[1])[1];
        }

        \Image::make($request->logo)->save(public_path('/storage/images/' . $name));
        \Image::make($request->picture)->save(public_path('/storage/images/' . $name_picture));

        $input = $request->except('role');
        $input['logo'] = $name;
        $input['picture'] = $name_picture;
        $input['password'] = Hash::make($input['password']);

        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->picture = $input['picture'];
        $user->password = $input['password'];


        if ($user->save()) {
            $broker = $user->broker()->firstOrNew([]);
            $broker->broker_name = $input['broker_name'];
            $broker->broker_license = $input['broker_license'];
            $broker->logo = $input['logo'];
            $broker->banner_color = $input['banner_color'];
            $broker->body_color = $input['body_color'];
            $broker->button_color = $input['button_color'];
            $broker->lock_color = $input['lock_color'];
            $broker->save();

            $user->roles()->attach(4);
        };




        return response()->json($user);
    }
}
