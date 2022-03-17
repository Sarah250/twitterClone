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
<<<<<<< Updated upstream
=======
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="card">
                    <div class="card-header"> Tweets</div>
                    <div class="row justify-content-center ">
                        @foreach($user->tweets as $tweet)
                                <div class="row ">
                                    <h5 class="mt-2">
                                        {{$tweet->tweet}}
                                    </h5>
                                    <div class="">
                                        {{date('d, M, Y', strtotime($tweet->created_at))}}
                                    </div>
                                    <div class="row">
                                        <div class="d-flex"> 
                                        <form method="post" action="{{ route('profile.delete_tweet',['id' => $tweet->id]) }}">
                                            @csrf
                                            @method('DELETE')

                                            <div class="p-2">
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                            
                                                </div>
                                        </form>
                                        <form method="post" action="{{ route('profile.up',['id' => $tweet->id,'user' => $user]) }}">
                                            @csrf
                                            @method('PATCH')

                                            <div class="p-2">
                                                <button type="submit" class="btn btn-primary">
                                                    Up
                                                </button>
                            
                                                </div>
                                        </form>
                                        <form method="post" action="{{ route('profile.down',['id' => $tweet->id,'user' => $user]) }}">
                                            @csrf
                                            @method('PATCH')

                                            <div class="p-2">
                                                <button type="submit" class="btn btn-secondary">
                                                    Down
                                                </button>
                            
                                                </div>
                                        </form>
                                        </div>
                                    
                                       <!--  {!! Form::open(['method' => 'PATCH', 'route' => ['profile.down', $tweet->id,$user]]) !!}
                                            <div class="form-group mb-3">
                                        {!! Form::submit('Down', ['class'=>'btn btn-secondary']) !!}
                                            </div>
                                        {!! Form::close() !!} -->
                                    </div>
                                        
                                
                                </div>
                        @endforeach        
                    </div>
                </div>
            </div>
        </div>        
>>>>>>> Stashed changes
    </div>
</div>
@endsection
