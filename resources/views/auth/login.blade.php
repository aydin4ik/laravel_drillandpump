@extends('layouts.app')

@section('content')

{{ Breadcrumbs::render('login') }}

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-50">
        <div class="card">
            <div class="card-content">
                <div class="field has-text-centered ">
                    <img class="image is-64x64" src="{{asset('images/drillandpump-logo.png')}}" alt="" style="display:inline">
                    <h1 class="title has-text-weight-light">{{ __('navbar.login') }}</h1>
                </div>
                

            <form action="{{route('login')}}" method="POST" role="form">
                @csrf
                <div class="field">
                    <label for="email" class="label">{{ __('auth.email') }}</label>
                    <p class="control">
                        <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" value="{{old('email')}}" type="text" name="email" id="email" placeholder="name@example.com" autofocus>
                    </p>
                    @if($errors->has('email'))
                        <p class="help is-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="password" class="label">{{ __('auth.password') }}</label>
                    <p class="control">
                        <input class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password">
                    </p>
                    @if($errors->has('password'))
                        <p class="help is-danger">{{$errors->first('password')}}</p>
                    @endif
                </div>

                <div class="field">
                    <b-checkbox name="remember" class="m-t-5">{{ __('auth.remember') }}</b-checkbox>                                        
                </div>
                <div class="field">
                    <button class="button is-primary is-outlined is-full-width">{{ __('auth.signIn') }}</button>
                </div>
            </form>

            

            </div>
        </div>
        <div class="field has-text-centered m-t-5">
            <a href="{{route('register')}}" class="link is-size-7">{{ __('auth.createAccount') }}</a> 
            <br>
            <a href="{{route('password.request')}}" class="link is-size-7">{{ __('auth.forgotPassword') }}</a>                
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@section('scripts')
<script>    
    var app = new Vue({
        el: '#app',
        data: {}
    });
</script>
@endsection