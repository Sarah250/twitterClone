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

        $entry =  auth()->user()->tweets()->create($data);

        $entry->order = $entry->id;

        $entry->save();

        return redirect('/profile/' .auth()->user()->id);
    }

    public function delete_tweet($id){

        $tweet = Tweet::find($id);

        $tweet->delete();

        return redirect('/profile/' .auth()->user()->id);
    }

    public function up($tweet_id, User $user){
            //dd($twitter_id,$user->tweets->count());

            $tweetsArray = $user->tweets;

            $length = count($user->tweets);
            
            $tweetUp = Tweet::find($tweet_id);

           for($i = 0; $i < $length; $i++)
            {
                
                if ($tweetsArray[$i]->id == $tweet_id and $i!==0)
                {
                    $tweetDown = Tweet::find($tweetsArray[$i-1]->id);

                    $orderUp = $tweetUp->order;
                    $orderDown = $tweetDown->order;
                    
                    $tweetDown->order = $orderUp;
                    $tweetUp->order = $orderDown;
                    

                    $tweetUp->save();
                    $tweetDown->save();


                } 
            }
            return redirect('/profile/' .auth()->user()->id);
    }

    public function down($tweet_id, User $user){
        $tweetsArray = $user->tweets;

        $length = count($user->tweets);
        
        $tweetDown = Tweet::find($tweet_id);  

           

           for($i = 0; $i < $length; $i++)
            {
               
                if ($tweetsArray[$i]->id == $tweet_id and $i != $length-1)
                {
                    
                    
                    $tweetUp = Tweet::find($tweetsArray[$i+1]->id);

                    $orderUp = $tweetUp->order;
                    $orderDown = $tweetDown->order;
                    
                    $tweetDown->order = $orderUp;
                    $tweetUp->order = $orderDown;
                    

                    $tweetUp->save();
                    $tweetDown->save();


                } 
            }
            return redirect('/profile/' .auth()->user()->id);
    }
}
