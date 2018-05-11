@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title is-4">Manage Roles</h1>
        </div>
        <div class="column">
            <a href="{{route('roles.create')}}" class="button is-primary is-pulled-right"><i class="m-r-15 fa fa-user-plus" aria-hidden="true"></i>Add new Role</a>
        </div>
    </div>
    <hr>


    <div class="columns is-multiline">
        @foreach ($roles as $role)
            <div class="column is-one-quarter">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h3 class="title is-size-6">{{$role->display_name}}</h3>
                                <h5 class="subtitle is-size-7">{{$role->name}}</h5>
                                <p>{{$role->description}}</p>
                            </div>
                        </div>
                    </article>
                    <div class="m-t-5 columns is-mobile">
                        <div class="column is-one-half">
                            <a href="{{route('roles.show', $role->id)}}" class="button is-primary is-fullwidth">Details</a>                            
                        </div>
                        <div class="column is-one-half">
                            <a href="{{route('roles.edit', $role->id)}}" class="button is-danger is-fullwidth">Edit</a>                            
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
    
@endsection