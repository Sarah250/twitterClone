@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <h1>Ola {{$user->username}} </h1>
        <a href="/t/create"> Add new Tweet </a>
       
        
        
        <div class="">
        @foreach($user->tweets as $tweet)
                <div class="">
                    {{$tweet->tweet}}
                    {{$tweet->created_at}}
                    
                        {!! Form::open(['method' => 'DELETE', 'route' => ['profile.delete_tweet', $tweet->id]]) !!}
                            <div class="form-group">
                         {!! Form::submit('Remove employee', ['class'=>'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                  
                </div>
        @endforeach        
        </div>
    </div>
</div>
@endsection
