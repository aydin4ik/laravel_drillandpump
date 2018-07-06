@extends('layouts.manage')

@section('content')

    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-size-4">Create Slide</h1>
                <hr>
            </div>
        </div>

        <form action="{{route('slides.store')}}" method="POST" class="form">
            @csrf
            <input type="hidden" v-model="locale.selected" name="locales">
            <div class="columns">
                <div class="column">
                    <div class="box" v-for="(field, index) in fields">
                        <div class="fields">
                            <b-field>
                                <b-select 
                                    placeholder="Select Language"
                                    expanded
                                    v-model="field.locale"
                                    required>
                                    <option 
                                        v-for="(locale, key) in locale.supported"
                                        :value ="key"
                                        :key ="locale.regional">
                                        @{{ locale.name }}
                                    </option>
                                </b-select>                        
                            </b-field>
                            <b-field label="Title">
                                <b-input 
                                    placeholder="type your title here" 
                                    v-model="field.title" 
                                    :name="'title_' + field.locale"                                      
                                    :disabled="field.locale == null"
                                    required>
                                </b-input>
                            </b-field>
                            <b-field label="Content">
                                <b-input 
                                    type="textarea" 
                                    placeholder="type your content here" 
                                    v-model="field.content" 
                                    :name="'content_' + field.locale"  
                                    :disabled="field.locale == null"
                                    required>
                                </b-input>
                            </b-field>
                        </div>
                        
                        <button 
                            class="button is-fullwidth is-danger is-outlined m-t-15" 
                            v-if="field.remove"
                            @click.prevent="removeFields(index)">
                            <span class="icon">
                                <i class="fa fa-times"></i>
                            </span>
                            <span>Remove this fields</span>
                        </button>
                            
                    </div>
                    <button 
                        class="button is-fullwidth m-t-15" 
                        @click.prevent="addFields()"
                        :disabled="addButtonStatus">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span>Add new fields</span>
                    </button>
                </div>
                <div class="column is-one-quarter">
                    <div class="box publish-widget">
                        <div class="author area">
                            <img class="is-pulled-left m-r-10" src="{{asset('images/user.png')}}" alt="">
                            <span class="title is-7">Aydin</span>
                            <span class="subtitle is-7">aydin4ik88@gmail.com</span>
                        </div>
                        <div class="status area" v-if="draft.saved">
                            <span class="icon is-pulled-left m-r-15 m-t-15 is-size-3 has-text-primary">
                                <i class="fa fa-pencil-square-o"></i>
                            </span>
                            <span class="title is-7">Draft saved</span>
                            <span class="subtitle is-7">@{{draft.time}}</span>
                        </div>
                        <div class="submit">
                            <button class="button is-fullwidth" @click.prevent="saveDraft()">Save Draft</button>
                            <button class="button is-fullwidth is-primary m-t-5">Create Slide</button>
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
        el: "#app",
        data: {
            addButtonStatus: false,
            fields: [
                {
                  title: "",
                  content: "",
                  locale: null,
                  add: true,
                  remove: false  
                }
            ],
            locale: {
                supported : @json(LaravelLocalization::getSupportedLocales()),
                available : [],
                selected: [],
            },
            draft: {
                saved: false,
                time: "",
            },            
        },
        methods: {
            addFields() {
                if(this.fields.length == _.size(this.locale.supported ) - 1) {
                    this.addButtonStatus = true;
                }else{
                    this.addButtonStatus = false;

                }
                    var elem = document.createElement('div');
                    elem.className ='fields';
                    this.fields.push({
                        title: "",
                        content: "",
                        locale: null,
                        add: false,
                        remove: true
                    });
                
                
            },
            removeFields(index) {
                this.fields.splice(index, 1);
                if(this.fields.length < _.size(this.locale.supported )) {
                    this.addButtonStatus = false;
                }

                
            },
            saveDraft() {
                this.draft.time = new Date();
                this.draft.saved = true;
            }       
        },
        watch: {
            fields: {
                handler: function (val, oldval) {
                    this.fields.forEach(field => {
                        if(field.locale === null){
                            return
                        }
                        if(!this.locale.selected.includes(field.locale)){
                            this.locale.selected.push(field.locale.slice(0 , 2));                        
                        }
                    });
                },
                deep: true
            }
        }
        
        
    })
 </script>
     
 @endsection