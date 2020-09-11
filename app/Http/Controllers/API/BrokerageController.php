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
            'logo' => 'required',
            'picture' => 'required',
            'broker' => 'required',
        ]);


        $name = time() . time() . '.' . explode('/', explode(':', substr($request->logo, 0, strpos($request->logo, ';')))[1])[1];


        $name_picture = time() . '.' . explode('/', explode(':', substr($request->picture, 0, strpos($request->picture, ';')))[1])[1];


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
            $broker->broker_name = $input['broker']['broker_name'];
            $broker->broker_license = $input['broker']['broker_license'];
            $broker->logo = $input['broker']['logo'];
            $broker->banner_color = $input['banner_color'];
            $broker->body_color = $input['body_color'];
            $broker->button_color = $input['button_color'];
            $broker->lock_color = $input['lock_color'];
            $broker->save();

            $user->roles()->attach(4);
        };





        return response()->json($user);
    }

    public function update(Request $request, $id)
    {

        // $this->authorize('isAdmin');

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'phone' => 'required|digits_between:8,15',
            'logo' => 'required',
            'broker' => 'required',
        ]);


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
            $user->password = $input['password'];
        }


        if ($request->hasFile('picture')) {

            $input['picture'] = time() . '.' . explode('/', explode(':', substr($request->picture, 0, strpos($request->picture, ';')))[1])[1];


            \Image::make($request->picture)->save(public_path('/storage/images/' . $input['picture']));

            $user->picture = $input['picture'];
        }




        if ($user->save()) {
            $broker = $user->broker()->firstOrNew([]);
            $broker->broker_name = $input['broker']['broker_name'];
            $broker->broker_license = $input['broker']['broker_license'];

            if ($request->hasFile('logo')) {
                $input['logo'] = time() . time() . '.' . explode('/', explode(':', substr($request->logo, 0, strpos($request->logo, ';')))[1])[1];
                $broker->logo = $input['broker']['logo'];

                \Image::make($request->logo)->save(public_path('/storage/images/' . $input['logo']));
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
