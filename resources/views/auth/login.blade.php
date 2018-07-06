@extends('layouts.app')

@section('content')

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
                    <b-field label="{{ __('auth.email') }}">
                        <b-input type="email" name="email" id="email" v-model="email"></b-input>
                    </b-field>

                    <b-field label="{{ __('auth.password') }}">
                        <b-input type="password" name="password" id="password" v-model="password"></b-input>
                    </b-field>

                    <div class="field">
                        <b-checkbox name="remember" class="m-t-5">{{ __('auth.remember') }}</b-checkbox>                                        
                    </div>
                    <div class="field">
                    </div>
                    <button class="button is-primary is-outlined is-full-width">{{ __('auth.signIn') }}</button>
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

@endsection


@section('scripts')
<script>    
    

    var app = new Vue({

        el: '#app',

        data: {
            email: '',
            password: '',
        }       
    });
</script>
@endsection
