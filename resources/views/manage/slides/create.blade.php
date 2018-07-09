@extends('layouts.manage')

@section('content')

    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-size-4">Create Slide</h1>
                <hr>
            </div>
        </div>

        <form action="{{route('slides.store')}}" method="POST" class="form" @submit.prevent="onSubmit" @keydown="form.errors.clear('fields.' + $event.target.attributes.index.value + '.' + $event.target.name)">
            @csrf
            <div class="columns">
                <div class="column">
                    <div class="box" v-for="(field, index) in form.fields">
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
                        <b-field
                            :message="form.errors.get('fields.' + index + '.title')"
                            :type="form.errors.has('fields.' + index + '.title') ? 'is-danger' : ''" 
                            label="Title">
                            <b-input 
                                placeholder="type your title here" 
                                v-model="field.title" 
                                name="title"                                      
                                :disabled="field.locale == null"
                                :index="index"
                                >
                            </b-input>
                        </b-field>
                        <b-field
                            :message="form.errors.get('fields.' + index + '.content')"
                            :type="form.errors.has('fields.' + index + '.content') ? 'is-danger' : ''" 
                            label="Content">
                            <b-input 
                                type="textarea" 
                                placeholder="type your content here" 
                                v-model="field.content" 
                                name="content"  
                                :disabled="field.locale == null"
                                :index="index"
                                >
                            </b-input>
                        </b-field>
                    </div>
                    <button 
                        class="button is-fullwidth m-t-15" 
                        @click.prevent="addFields()">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span>Add new fields</span>
                    </button>
                </div>
                <div class="column is-one-quarter">
                    <div class="box publish-widget" :class="this.form.loading ? 'is-loading' : ''">
                        <div class="author area">
                            <img class="is-pulled-left m-r-10" src="{{asset('images/user.png')}}" alt="">
                            <span class="title is-7">{{Auth::user()->name}}</span>
                            <span class="subtitle is-7">{{Auth::user()->email}}</span>
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
                            <button
                                class="button is-fullwidth is-primary m-t-5">Create Slide</button>
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
            draft: {
                saved: false,
                time: "",
            },
            locale: {
                supported : @json(LaravelLocalization::getSupportedLocales()),
            }, 
            form: new Form({
                fields: [
                    {
                    title: '',
                    content: '',
                    locale: null
                    }
                ],
            })
        },
        methods: {
            onSubmit(){
                this.form.post(route('slides.store'))
                    .then(response => {
                        this.addFields();
                        this.$snackbar.open({
                            message: 'Slide has been saved',
                            type: 'is-success',
                            actionText: 'view',
                            onAction: () => {this.form.redirectTo(route('slides.index'))}
                        });
                    });
            },
            addFields(){
                this.form.fields.push({
                    title: '',
                    content: '',
                    locale: null
                })
                
            },            
        }
    })
    
</script>
     
 @endsection