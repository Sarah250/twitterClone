@extends('layouts.app')

@section('content')
<div class="container">
    <div>
    <h1>Ola {{$user->username}} </h1>
    <a href=""> Add new Tweet </a>
    </div>
</div>
@endsection
