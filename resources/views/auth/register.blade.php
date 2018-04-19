@extends('layouts.app')

@section('content')

{{ Breadcrumbs::render('register') }}


<div class="columns">
        <div class="column is-one-third is-offset-one-third m-t-50">
            <div class="card">
                <div class="card-content">
                    <div class="field has-text-centered ">
                        <img class="image is-64x64" src="{{asset('images/drillandpump-logo.png')}}" alt="" style="display:inline">
                        <h1 class="title has-text-weight-light">{{ __('Register') }}</h1>
                    </div>
                    
    
                <form action="{{route('register')}}" method="POST" role="form">
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
                        <label for="name" class="label">Your name</label>
                        <p class="control">
                            <input class="input {{$errors->has('name') ? 'is-danger' : ''}}" value="{{old('name')}}" type="text" name="name" id="name">
                        </p>
                        @if($errors->has('name'))
                            <p class="help is-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
    
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <p class="control">
                            <input class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password">
                        </p>
                        @if($errors->has('password'))
                            <p class="help is-danger">{{$errors->first('password')}}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
                        <p class="control">
                            <input class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password_confirmation" id="password-confirm">
                        </p>
                        @if($errors->has('password'))
                            <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
                        @endif
                    </div>
    
                    
                    <div class="field">
                        <button class="button is-primary is-outlined is-full-width">{{ __('Register') }}</button>
                    </div>
                </form>
    
                
    
                </div>
            </div>
            <div class="field has-text-centered m-t-5">
                <a href="{{route('login')}}" class="link is-size-7">Already have an Account?</a> 
            </div>
        </div>
    </div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
