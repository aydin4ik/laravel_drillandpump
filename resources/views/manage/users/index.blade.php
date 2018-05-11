@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title is-4">Manage Users</h1>
        </div>
        <div class="column">
            <a href="{{route('users.create')}}" class="button is-primary is-pulled-right"><i class="m-r-15 fa fa-user-plus" aria-hidden="true"></i>Add new User</a>
        </div>
    </div>
    <hr>

    <div class="card">
        <div class="card-content">
            <table class="table is-fullwidth is-hoverable is-narrow is-size-7">        
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Created</th>
                        <th></th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($users as $user)                    
                        <tr>
                            <th>{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><span class="tag is-info">{{$user->created_at->toFormattedDateString()}}</span></td>
                            <td class="has-text-right">
                                <a href="{{route('users.edit', $user->id)}}" class="button is-danger is-small">Edit</a>
                                <a href="{{route('users.show', $user->id)}}" class="button is-outlined is-small">Show</a>
                            </td>
                        </tr>
                    @endforeach                
                </tbody>            
            </table>
        </div>
    </div>

    {{$users->links()}}

</div>
    
@endsection