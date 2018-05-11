@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title is-4">Create Permission</h1>
        </div>
    </div>
    <hr>

    <form action="{{route('permissions.store')}}" method="POST" class="form">
        @csrf
        <div class="field">
            <b-radio v-model="permission_type" name="permission_type" native-value="basic">Basic Permission</b-radio>
            <b-radio v-model="permission_type" name="permission_type" native-value="crud">CRUD Permission</b-radio>                    
        </div>
        <div class="columns" v-if="permission_type == 'basic'">
            <div class="column">
                <div class="field">
                    <label for="display_name" class="label">Name (Displayed Name)</label>
                    <input type="text" class="input" name="display_name" id="display_name" autofocus>
                    @if($errors->has('display_name'))
                        <p class="help is-danger">{{$errors->first('display_name')}}</p>
                    @endif
                </div>
                <div class="field">
                    <label for="name" class="label">Slug</label>
                    <input type="text" class="input" name="name" id="name" placeholder="example: action-subject">
                    @if($errors->has('name'))
                        <p class="help is-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="field">
                    <label for="description" class="label">Description</label>
                    <input type="text" class="input" name="description" id="description" placeholder="Describe what permission does">
                    @if($errors->has('description'))
                        <p class="help is-danger">{{$errors->first('description')}}</p>
                    @endif
                </div>
        
                <button class="button is-success">Create Permission</button>
                
            </div>
        </div>

        <div class="field m-b-25" v-if="permission_type == 'crud'">
            <label for="resource" class="label">Resource</label>
            <input type="text" class="input" name="resource" id="resource" placeholder="The name of resource" v-model="resource" autofocus>
            @if($errors->has('resource'))
                <p class="help is-danger">{{$errors->first('resource')}}</p>
            @endif
        </div>
        
        <div class="columns" v-if="permission_type == 'crud'">
            
            <div class="column is-one-third">
                <div class="field">
                    <b-checkbox v-model="crud_selected" native-value="create">Create</b-checkbox>
                </div>
                <div class="field">
                    <b-checkbox v-model="crud_selected" native-value="read">Read</b-checkbox>
                </div>
                <div class="field">
                    <b-checkbox v-model="crud_selected" native-value="update">Update</b-checkbox>
                </div>
                <div class="field">
                    <b-checkbox v-model="crud_selected" native-value="delete">Delete</b-checkbox>
                </div>
                <button class="button is-success">Create Permission</button>
                
            </div>

            <input type="hidden" name="crud_selected" :value="crud_selected">

            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <table class="table is-fullwidth is-hoverable">
                            <thead>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                            </thead>
                            <tbody v-if="resource.length >= 3">
                                <tr v-for="item in crud_selected">
                                    <td v-text="crud_name(item)"></td>
                                    <td v-text="crud_slug(item)"></td>
                                    <td v-text="crud_description(item)"></td>
        
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
            permission_type: 'basic',
            resource: '',
            crud_selected: ['create', 'read', 'update', 'delete']
          },
          methods: {
              crud_name: function(item){
                  return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
              },
              crud_slug: function(item){
                  return item.substr(0,1) + item.substr(1) + "-" + app.resource.substr(0,1) + app.resource.substr(1); 
              },
              crud_description: function(item){
                  return "Allow a user to " + item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
              }
          }
        });
    </script>
@endsection