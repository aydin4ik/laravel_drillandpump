@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title is-4">Edit Permission</h1>
        </div>
    </div>
    <hr>

    <div class="card">
        <div class="card-content">
        <form action="{{route('permissions.update', $permission->id)}}" method="POST" class="form">
            @method('PUT')
            @csrf

            <div class="field">
                <label for="name" class="label">Name</label>
                <p class="control">
                    <input type="text" name="name" id="name" class="input" value="{{$permission->name}}" disabled>
                </p>
                @if($errors->has('name'))
                    <p class="help is-danger">{{$errors->first('name')}}</p>
                @endif
            </div>

            <div class="field">
                <label for="display_name" class="label">Display Name</label>
                <p class="control">
                    <input type="text" name="display_name" id="display_name" class="input" value="{{$permission->display_name}}">
                </p>
                @if($errors->has('display_name'))
                    <p class="help is-danger">{{$errors->first('display_name')}}</p>
                @endif
            </div>

            <div class="field">
                <label for="description" class="label">Description</label>
                <p class="control">
                    <input type="text" name="description" id="description" class="input" value="{{$permission->description}}">
                </p>
                @if($errors->has('description'))
                    <p class="help is-danger">{{$errors->first('description')}}</p>
                @endif
            </div>

            

            <button class="button is-success">Save Changes</button>
            
        </form>
        </div>
    </div>


</div>
    
@endsection

