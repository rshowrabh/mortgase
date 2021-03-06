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
            'phone' => 'required|digits_between:8,15',
            'picture' => 'required',
            'broker.logo' => 'required',
            'broker.broker_name' => 'required',
            'broker.broker_license' => 'required',

        ]);

        $input = $request->all();


        $name_picture = time() . $request->email .  '-picture.' . explode('/', explode(':', substr($request->picture, 0, strpos($request->picture, ';')))[1])[1];
        \Image::make($request->picture)->save(public_path('/storage/images/' . $name_picture));


        $name = time() . $request->email .  '-logo.' . explode('/', explode(':', substr($input['broker']['logo'], 0, strpos($input['broker']['logo'], ';')))[1])[1];
        \Image::make($input['broker']['logo'])->save(public_path('/storage/images/' . $name));




        $input['picture'] = $name_picture;
        $input['password'] = Hash::make($input['password']);

        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->picture = $input['picture'];
        $user->password = $input['password'];
        $user->phone = $input['phone'];


        if ($user->save()) {
            $broker = $user->broker()->firstOrNew([]);
            $broker->broker_name = $input['broker']['broker_name'];
            $broker->broker_license = $input['broker']['broker_license'];
            $broker->banner_color = $input['broker']['banner_color'];
            $broker->body_color = $input['broker']['body_color'];
            $broker->button_color = $input['broker']['button_color'];
            $broker->lock_color = $input['broker']['lock_color'];
            $broker->logo = $name;


            $broker->save();

            $user->roles()->attach(4);
        }




        return response()->json($user);
    }

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



        if ($request->has('password')) {
            $user->password =  Hash::make($input['password']);
        }


        if (strlen($request->picture) > 100) {

            $input['picture'] = time()  . $request->email .  '-picture.' . explode('/', explode(':', substr($request->picture, 0, strpos($request->picture, ';')))[1])[1];


            \Image::make($request->picture)->save(public_path('/storage/images/' . $input['picture']));

            $user->picture = $input['picture'];
        }




        if ($user->save()) {
            $broker = $user->broker()->firstOrNew([]);
            $broker->broker_name = $input['broker']['broker_name'];
            $broker->broker_license = $input['broker']['broker_license'];

            if (strlen($request->broker['logo']) > 100) {

                $input['broker']['logo'] = time() . time() . $request->email .  '-logo.' . explode('/', explode(':', substr($request->broker['logo'], 0, strpos($request->broker['logo'], ';')))[1])[1];
                $broker->logo = $input['broker']['logo'];

                \Image::make($request->broker['logo'])->save(public_path('/storage/images/' . $input['broker']['logo']));
            }

            $broker->banner_color = $input['broker']['banner_color'];
            $broker->body_color = $input['broker']['body_color'];
            $broker->button_color = $input['broker']['button_color'];
            $broker->lock_color = $input['broker']['lock_color'];
            $broker->save();
        }


        $user->save();




        return $request->all();
    }
}
