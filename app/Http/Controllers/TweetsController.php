<?php

namespace App\Http\Controllers;

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
}
