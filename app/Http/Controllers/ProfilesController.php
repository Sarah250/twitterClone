<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ProfilesController extends Controller
{
    //
    public function index(User $user)
    {
        return view('profiles.index',compact('user'));
    }

    public function edit(User $user)
    {
        return view('profiles.edit',compact('user'));
    }

    public function change_password(User $user){
        $data = request()->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|different:current_password|same:confirm_password',
            'confirm_password' => 'required|min:8'
        ]);

        if(Hash::check($data['current_password'], Auth::user()->password))
        {
            $user->password = Hash::make($data['password']);
            $user->save();

            session()->flash('password_success', 'Password has been changed successfuly!');
            
        }
        else 
        {
            session()->flash('password_error', 'Password does not match!');
        }

    }

    public function update(User $user){
        $data = request()->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|different:current_password|confirmed'
        ]);

        if(Hash::check($this->current_password, Auth::user()->password))
        {
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('password_success', 'Password has been changed successfuly!');
        }
        else 
        {
            session()->flash('password_error', 'Password does not match!');
        }
    }
    
}
