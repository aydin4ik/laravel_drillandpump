@extends('layouts.manage')

@section('content')

<div class="flex-container">
    
    <div class="columns">
        <div class="column">
            <h1 class="title is-4">Show Permission Details</h1>
        </div>
        <div class="column">
            <a href="{{route('permissions.edit', $permission->id)}}" class="button is-primary is-pulled-right">Edit Permission</a>
        </div>
    </div>
    <hr>

    <div class="card">
        <div class="card-content">
            <div class="field">
                <label for="name" class="label">Name</label>
                <p class="control">
                    {{$permission->name}}
                </p>
            </div>

            <div class="field">
                <label for="display_name" class="label">Display Name</label>
                <p class="control">
                    {{$permission->display_name}}
                </p>
            </div>

            <div class="field">
                <label for="description" class="label">Description</label>
                <p class="control">
                    {{$permission->description}}
                </p>
            </div>

        </div>
    </div>


</div>
    
@endsection