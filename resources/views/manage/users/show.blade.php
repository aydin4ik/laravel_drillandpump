@extends('layouts.manage')

@section('content')

<div class="flex-container">
    
    <div class="columns">
        <div class="column">
            <h1 class="title is-4">Show User Details</h1>
        </div>
        <div class="column">
            <a href="{{route('users.edit', $user->id)}}" class="button is-primary is-pulled-right">Edit User</a>
        </div>
    </div>
    <hr>

    <div class="card">
        <div class="card-content">
            <div class="field">
                <label for="name" class="label">Name</label>
                <p class="control">
                    {{$user->name}}
                </p>
            </div>

            <div class="field">
                <label for="email" class="label">Email</label>
                <p class="control">
                    {{$user->email}}
                </p>
            </div>

            <div class="field">
                <label for="email" class="label">Roles</label>
                <p class="control">
                    {{$user->roles->count() == 0 ? 'There are no roles assigned yet to this user' : ''}}
                    <ul>
                        @foreach ($user->roles as $role)
                            <li>{{$role->display_name}} ({{$role->description}})</li>
                        @endforeach
                    </ul>
                </p>
            </div>
        </div>
    </div>


</div>
    
@endsection