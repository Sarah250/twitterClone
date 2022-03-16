@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
        <form method="post" action="/t" enctype="multipart/form-data">
            @csrf

                <div class="row mb-3">
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
                <div class="row mb-0">
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
@endsection