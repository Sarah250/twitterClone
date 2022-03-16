<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index($user)
    {
        $user = User::find($user);

        return view('profiles.index',[
            'user' => $user
        ]);
<<<<<<< Updated upstream
    }

=======

        if(Hash::check($data['current_password'], Auth::user()->password))
        {
            $user->password = Hash::make($data['password']);
            $user->save();

            session()->flash('password_success', 'Password has been changed successfuly!',array('timeout' => 3000));
            return view('profiles.edit',compact('user'));
        }
        else 
        {
            session()->flash('password_error', 'Password does not match!',array('timeout' => 3000));
            return view('profiles.edit',compact('user'));
        }

    }
>>>>>>> Stashed changes
    
}
