@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <h1> Change Password </h1>
        <div class="col-8 offset-2">
        <form method="post" action="/profile/{{$user->id}}/edit" enctype="multipart/form-data" id="change_password_form">
            @csrf
            @method('PATCH')

                <div class="row mb-3">
                    <label for="current_password" class="col-md-4 col-form-label text-md-end">Current Password</label>

                        <div class="col-md-6">
                            <input 
                                id="current_password" 
                                type="password" 
                                class="form-control @error('current_password') is-invalid @enderror" 
                                name="current_password" 
                                value="{{ old('current_password') }}" 
                                autofocus>

                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">New Password</label>

                        <div class="col-md-6">
                            <input 
                                id="password"
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" 
                                value="{{ old('password') }}" 
                                autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="confirm_password" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                        <div class="col-md-6">
                            <input 
                                id="confirm_password" 
                                type="password" 
                                class="form-control @error('confirm_password') is-invalid @enderror" 
                                name="confirm_password" 
                                value="{{ old('confirm_password') }}" 
                                autofocus>

                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @if(Session::has("password_success"))
            <div class="alert alert-success" role="alert"> {{Session::get('password_success')}} </div>
        @endif
        @if(Session::has("password_error"))
            <div class="alert alert-danger" role="alert"> {{Session::get('password_error')}} </div>
        @endif
    </div>    

</div>
@endsection
