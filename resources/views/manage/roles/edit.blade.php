@extends('layouts.manage')

@section('content')

<div class="flex-container">
    
    <div class="columns">
        <div class="column">
            <h1 class="title is-4">Edit {{$role->display_name}}</h1>
        </div>
    </div>
    <form action="{{route('roles.update', $role->id)}}" method="POST" class="form">
        @csrf
        @method('PUT')
        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h1 class="title is-6">Details:</h1>
                                

                                    
                                    <div class="field">
                                        <label for="name" class="label">Name</label>
                                        <input type="text" class="input" name="name" id="name" value="{{$role->name}}" disabled>
                                    </div>
                                    <div class="field">
                                        <label for="display_name" class="label">Display Name</label>
                                        <input type="text" class="input" name="display_name" id="display_name" value="{{$role->display_name}}">
                                    </div>
                                    <div class="field">
                                        <label for="description" class="label">Description</label>
                                        <input type="text" class="input" name="description" id="description" value="{{$role->description}}">
                                    </div>
                                    <input type="hidden" :value="permissionsSelected" name="permissions">
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <hr>
    
        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h3 class="title is-size-6">Permissions:</h3>
                                    @foreach ($permissions as $permission)
                                    <div class="field">
                                        <b-checkbox v-model="permissionsSelected" :native-value="{{$permission->id}}">{{$permission->display_name}} <em class="m-l-5">({{$permission->description}})</em></b-checkbox>                                        
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                    </article>
                </div>
                <button class="button is-success">Edit {{$role->display_name}}</button>
                
            </div>
        </div>
    </form>
    


</div>
    
@endsection

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                permissionsSelected: {!!$role->permissions->pluck('id')!!},
            }
        });
    </script>
@endsection