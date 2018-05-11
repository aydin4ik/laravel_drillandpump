@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title is-4">Create User</h1>
        </div>
    </div>
    <hr>


    <form action="{{route('users.store')}}" method="POST" class="form">
        @csrf
        <div class="field">
            <label for="name" class="label">Name</label>
            <p class="control">
                <input type="text" name="name" id="name" class="input">
            </p>
            @if($errors->has('name'))
                <p class="help is-danger">{{$errors->first('name')}}</p>
            @endif
        </div>

        <div class="field">
            <label for="email" class="label">Email</label>
            <p class="control">
                <input type="email" name="email" id="email" class="input">
            </p>
            @if($errors->has('email'))
                <p class="help is-danger">{{$errors->first('email')}}</p>
            @endif
        </div>

        <div class="field">
            <label for="password" class="label">Password</label>
            <p class="control">
                <input type="password" class="input" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to this user">
                <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate Password</b-checkbox>
            </p>
            @if($errors->has('password'))
                <p class="help is-danger">{{$errors->first('password')}}</p>
            @endif
        </div>

        <button class="button is-success">Create User</button>
        
    </form>



</div>
    
@endsection

@section('scripts')
    <script>
        var app = new Vue({
          el: '#app',
          data: {
            auto_password: true,
          }
        });
    </script>
@endsection