<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }



    public function showUsers()
    {
        // $users=User::all()->sortby('name');
        $users=User::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.users')->with('users', $users);
    }

    public function newUsers()
    {
        return view('admin.users-new');
    }

    public function createUsers(CreateUserRequest $request)
    {
        $user = new User;

        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->role=$request->role;
        $user->password=bcrypt($request->password);

        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photoName = str_replace(' ','', $request->name) . '_' . time() . '.' . $extension;

            $request->file('photo')->move('images/users', $photoName);

            $user->photo = $photoName;
        }

        $user->save();

        // return redirect()->back();
        // return redirect(route('users'));
        return back()->with('success','user added successfully');
    }

    public function showEditForm($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users-edit')->with('user', $user);
    }

    public function updateUser(UpdateUserRequest $request, $id)
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

            // delete old image from folder
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
        $user->role=$request->role;

        $user->save();
        // return redirect(route('users'));
        return back()->with('success','data updated successfully');
    }

    public function deleteUser($id)
    {
        $user=User::findOrFail($id)->delete();

        if($user)
        {
            return back();
        }
    }


    public function editPass(Request $request, $id)
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
