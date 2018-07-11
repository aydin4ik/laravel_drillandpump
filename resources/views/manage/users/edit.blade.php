@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title is-4">Edit User</h1>
        </div>
    </div>
    <hr>


    <form action="{{route('users.update', $user->id)}}" method="POST" class="form">
        @method('PUT')
        @csrf

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="name" class="label">Name</label>
                    <p class="control">
                        <input type="text" name="name" id="name" class="input" value="{{$user->name}}">
                    </p>
                    @if($errors->has('name'))
                        <p class="help is-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
    
                <div class="field">
                    <label for="email" class="label">Email</label>
                    <p class="control">
                        <input type="email" name="email" id="email" class="input" value="{{$user->email}}">
                    </p>
                    @if($errors->has('email'))
                        <p class="help is-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>
    
                <div class="field">
                    <label for="password" class="label">Password</label>
                    <div class="field">
                        <b-radio v-model="password_options" name="password_options" native-value="keep">Do Not Change Password</b-radio>
                    </div>
                    <div class="field">
                        <b-radio v-model="password_options" name="password_options" native-value="auto">Auto Generate New Password</b-radio>
                    </div>
                    <div class="field">
                        <b-radio v-model="password_options" name="password_options" native-value="manual">Manually Set New Password</b-radio>
                        <p class="control">
                            <input type="password" class="input m-t-15" name="password" id="password" v-if="password_options == 'manual'" placeholder="Manually give a password to this user">
                        </p>
                        @if($errors->has('password'))
                            <p class="help is-danger">{{$errors->first('password')}}</p>
                        @endif        
                    </div>                        
                </div>
                <input type="hidden" :value="rolesSelected" name="roles">
                
                
            </div>
            <div class="column">
                <div class="field">
                    <label for="roles" class="label">Roles</label>                        
                </div>
                @foreach ($roles as $role)
                    <div class="field">
                    <b-checkbox v-model="rolesSelected" native-value="{{$role->id}}">{{$role->display_name}}</b-checkbox>                            
                    </div>
                @endforeach
            </div>
        </div>
        
        <hr>    
        <button class="button is-success">Save Changes</button>
        
    </form>



</div>
    
@endsection

@section('scripts')
    <script>
        var app = new Vue({
          el: '#app',
          data: {
            password_options: 'keep',
            rolesSelected: {!! $user->roles->pluck('id') !!}
          }
        });
    </script>
@endsection