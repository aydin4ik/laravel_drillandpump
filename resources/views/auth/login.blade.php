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
                

                <form action="{{route('login')}}" method="POST" role="form" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                    @csrf
                    <b-field label="{{ __('auth.email') }}" :type="form.errors.has('email') ? 'is-danger' : ''" :message="form.errors.get('email')">
                        <b-input v-model="form.email" name="email"></b-input>
                    </b-field>

                    <b-field label="{{ __('auth.password') }}" :type="form.errors.has('password') ? 'is-danger' : ''" :message="form.errors.get('password')">
                        <b-input v-model="form.password" name="password" type="password" :password-reveal="!form.errors.has('password')"></b-input>
                    </b-field>
                    
                   

                    <div class="field">
                        <b-checkbox name="remember" class="m-t-5">{{ __('auth.remember') }}</b-checkbox>
                    </div>
                    <div class="field">
                        <button class="button is-primary is-medium  is-fullwidth" :class="form.loading ? 'is-loading' : ''" :disabled="form.errors.any()">{{ __('auth.signIn') }}</button>
                    </div>
                    <div class="field">
                        <a href="{{route('register')}}" class="button is-outlined is-primary is-fullwidth">{{ __('auth.createAccount') }}</a> 
                    </div>
                </form>
            </div>
        </div>
        <div class="field has-text-centered m-t-5">
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
            form: new Form({
                email: '',
                password: '',
            })
        },
        methods: {
            onSubmit(){
                this.form.post('login')
                    .then(response => this.form.redirectTo('home'));
            }
        }
    });
</script>
@endsection