@extends('layouts.app')

@section('content')

{{ Breadcrumbs::render('register') }}


<div class="columns">
        <div class="column is-one-third is-offset-one-third m-t-50">
            <div class="card">
                <div class="card-content">
                    <div class="field has-text-centered ">
                        <img class="image is-64x64" src="{{asset('images/drillandpump-logo.png')}}" alt="" style="display:inline">
                        <h1 class="title has-text-weight-light">{{ __('navbar.register') }}</h1>
                    </div>
                    
    
                <form action="{{route('register')}}" method="POST" role="form" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                    @csrf
                    <b-field label="{{ __('auth.email') }}" :type="form.errors.has('email') ? 'is-danger' : ''" :message="form.errors.get('email')">
                        <b-input v-model="form.email.val" name="email"></b-input>
                    </b-field>

                    <b-field label="{{ __('auth.name') }}" :type="form.errors.has('name') ? 'is-danger' : ''" :message="form.errors.get('name')">
                        <b-input v-model="form.name" name="name"></b-input>
                    </b-field>
                        
                    <b-field label="{{ __('auth.password') }}" :message="form.errors.get('password')" :type="type">
                        <b-input v-model="form.password" name="password" type="password"></b-input>
                    </b-field>

                    <b-field label="{{ __('auth.confirmPassword') }}" :type="type" :message="form.errors.get('password')">
                        <b-input v-model="form.password_confirmation" name="password_confirmation" type="password"></b-input>
                    </b-field>

                    
    
                    
                    <div class="field">
                        <button class="button is-primary is-medium is-fullwidth" :class="form.loading ? 'is-loading' : ''" :disabled="form.errors.any()">{{ __('auth.create') }}</button>
                        
                    </div>
                </form>
    
                
    
                </div>
            </div>
            <div class="field has-text-centered m-t-5">
                <a href="{{route('login')}}" class="link is-size-7">{{ __('auth.alreadyHave') }}</a> 
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
                email: {
                    val: '',
                    type: '',
                },
                name: '',
                password: '',
                password_confirmation: ''
            }),
            type: ''
        },
        methods: {
            onSubmit() {
                this.form.post('register')
                    .then(response => this.form.redirect('home'));
            },
            onConfirm() {
                return this.form.password == this.form.password_confirmation;
            }            
        },
        watch: {
            'form.password'() {
                if(this.form.password == ""){
                    return
                }
                this.type = 'is-danger';
                if( this.form.password == this.form.password_confirmation){
                    this.type = 'is-success';
                }
            },
            'form.password_confirmation' () {
                if(this.form.password_confirmation == ""){
                    return
                }
                this.type = 'is-danger';
                if(this.form.password == this.form.password_confirmation){
                    this.type = 'is-success';
                }
            }
        }

    })
</script>
    
@endsection