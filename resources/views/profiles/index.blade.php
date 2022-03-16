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
                </div>
        @endforeach        
        </div>
    </div>
</div>
@endsection
