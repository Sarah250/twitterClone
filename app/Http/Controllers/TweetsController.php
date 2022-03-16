<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;


class TweetsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('tweets.create');
    }

    public function store()
    {
        $data = request()->validate([
            'tweet' => 'required',
        ]);

        auth()->user()->tweets()->create($data);

        return redirect('/profile/' .auth()->user()->id);
    }

    public function delete_tweet($id){

        $tweet = Tweet::find($id);

        $tweet->delete();

        return redirect('/profile/' .auth()->user()->id);
    }
}
