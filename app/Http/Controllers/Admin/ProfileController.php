<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile($id)
    {
        if(auth()->user()->id==$id)
        {
            $user = User::findOrFail($id);
            return view('admin.user-profile')->with('user', $user);
        }
        return back();
    }


    public function updateProfile(UpdateUserRequest $request, $id)
    {

        if(auth()->user()->id==$id)
        {

            $this->validate($request,
                [
                    'email' => 'unique:users,email,' .$id
                ],
                [
                    'email.unique' => 'This email already exists in the database'
                ]
            );

            $user = User::findOrFail($id);

            if ($request->hasFile('photo')) {

                // delete old image
                if(!($user->photo == 'default.jpg'))
                {
                    File::delete('images/users/'.$user->photo);
                }

                $extension = $request->file('photo')->getClientOriginalExtension();
                $photoName = str_replace(' ','', $request->name) . '_' . time() . '.' . $extension;

                $request->file('photo')->move('images/users', $photoName);

                $user->photo = $photoName;
            }

            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->address=$request->address;

            $user->save();
            // return redirect(route('dashboard'));
            return back()->with('success','The data was saved successfully');
        }
        return back();
        // return back()->with('success','The data was saved successfully');
    }

    // update password

    public function editPassword(Request $request, $id)
    {
        $request->validate([

            'password' => [

                            'required', 'confirmed', Password::min(8)
                                ->letters()
                                ->numbers()
                                ->symbols()
                                ->uncompromised(5)

                        ],


        ],
        [
            'password.required' => 'You must enter a password in the field',
            'password.confimed' => 'You must confirm the same password',
            'password.numbers' => 'The password must contain at least one digit',


        ]);

        $user=User::findOrFail($id);

        $user->password=bcrypt($request->password);

        $user->save();

        // return redirect(route('users'));
        return back()->with('success','The password has been changed successfully');
    }
}
