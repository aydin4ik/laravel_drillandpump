@extends('layouts.app')

{{ Breadcrumbs::render('password.email') }}

@section('content')

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-50">
        <div class="card">
            <div class="card-content">
                <div class="field has-text-centered ">
                    <img class="image is-64x64" src="{{asset('images/drillandpump-logo.png')}}" alt="" style="display:inline">
                    <h1 class="title has-text-weight-light">{{ __('Reset Password') }}</h1>
                </div>
                
            @if (session('status'))
                <div class="notification is-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{route('password.email')}}" method="POST" role="form">
                @csrf
                <div class="field">
                    <label for="email" class="label">Email Address</label>
                    <p class="control">
                        <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" value="{{old('email')}}" type="text" name="email" id="email" placeholder="name@example.com" autofocus>
                    </p>
                    @if($errors->has('email'))
                        <p class="help is-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>

                <div class="field">
                    <button class="button is-primary is-outlined is-full-width">{{ __('Send Password Reset Link') }}</button>
                </div>
            </form>

            

            </div>
        </div>
        <div class="field has-text-centered m-t-5">
            <a href="{{route('login')}}" class="link is-size-7">Back to login</a> 
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
