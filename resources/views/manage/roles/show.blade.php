@extends('layouts.manage')

@section('content')

<div class="flex-container">
    
    <div class="columns">
        <div class="column">
            <h1 class="title is-4">Show Role Details</h1>
        </div>
        <div class="column">
            <a href="{{route('roles.edit', $role->id)}}" class="button is-primary is-pulled-right">Edit Role</a>
        </div>
    </div>

    <article class="media">
        <div class="media-content">
            <div class="content">
                <h3 class="title is-size-6">{{$role->display_name}} <em class="m-l-15 is-size-7">({{$role->name}})</em></h3>
                <p>{{$role->description}}</p>
            </div>
        </div>
    </article>

    <hr>
    
    <div class="columns">
        <div class="column">
            <div class="box">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <h3 class="title is-size-6">Permissions:</h3>
                            <ul>
                                @foreach ($role->permissions as $rp)
                                    <li>{{$rp->display_name}} <em class="m-l-15">({{$rp->description}})</em> </li>                           
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>


</div>
    
@endsection