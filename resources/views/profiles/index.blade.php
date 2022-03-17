@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <h1>Ola {{$user->username}} </h1>
       
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> New tweet </div>
                    <form method="post" action="/t" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3 mt-3">
                            <label for="tweet" class="col-md-4 col-form-label text-md-end">Tweet</label>

                                <div class="col-md-6">
                                    <input 
                                        id="tweet" 
                                        type="text" 
                                        class="form-control @error('tweet') is-invalid @enderror" 
                                        name="tweet" 
                                        value="{{ old('tweet') }}" 
                                        autocomplete="name" autofocus>

                                        @error('tweet')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    </div>
</div>
</div>
@endsection
