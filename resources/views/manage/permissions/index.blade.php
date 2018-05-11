@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title is-4">Manage Permissions</h1>
        </div>
        <div class="column">
            <a href="{{route('permissions.create')}}" class="button is-primary is-pulled-right"> <i class="m-r-15 fa fa-plus" aria-hidden="true"></i> Add new Permission</a>
        </div>
    </div>
    <hr>

    <div class="card">
        <div class="card-content">
            <table class="table is-fullwidth is-hoverable is-narrow is-size-7">        
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Desctiption</th>
                        <th></th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($permissions as $permission)                    
                        <tr>
                            <th>{{$permission->display_name}}</th>
                            <td>{{$permission->name}}</td>
                            <td><span class="tag is-info">{{$permission->description}}</span></td>
                            <td class="has-text-right">
                                <a href="{{route('permissions.edit', $permission->id)}}" class="button is-danger is-small">Edit</a>
                                <a href="{{route('permissions.show', $permission->id)}}" class="button is-outlined is-small">Show</a>
                            </td>
                        </tr>
                    @endforeach                
                </tbody>            
            </table>
        </div>
    </div>


</div>
    
@endsection