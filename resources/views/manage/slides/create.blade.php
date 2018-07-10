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
                                :disabled="field.disabled"
                                v-model="field.locale"
                                required>
                                <option 
                                    v-for="(locale, key) in field.locales"
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
                        <b-field>
                            <button 
                                class="button is-fullwidth is-danger is-outlined m-t-15" 
                                v-if="field.remove"
                                @click.prevent="removeFields(index)">
                                <span class="icon"><i class="fa fa-times"></i></span>
                                <span>Remove this fields</span>
                            </button>
                        </b-field>
                    </div>
                    <b-field>
                        <button
                            :disabled="this.form.fields[this.localeIndex].locale == null ? true : false"
                            class="button is-fullwidth" 
                            @click.prevent="addFields()">
                            <span class="icon">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span>Add new fields</span>
                        </button>
                    </b-field>
                    
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
            localeIndex: 0,
            draft: {
                saved: false,
                time: "",
            },            
            form: new Form({
                fields: [],
            })
        },
        created: function() {
            this.setInitialFields()
        },
        methods: {
            onSubmit() {
                this.form.post(route('slides.store'))
                    .then(response => {
                        this.setInitialFields();
                        this.$snackbar.open({
                            message: 'Slide has been saved',
                            type: 'is-success',
                            actionText: 'view',
                            onAction: () => {this.form.redirectTo(route('slides.index'))}
                        });
                    });
            },
            setInitialFields(){
                this.localeIndex = 0;
                this.form.fields.push({                    
                    title: '',
                    content: '',
                    locale: null,
                    locales: @json(LaravelLocalization::getSupportedLocales()),
                    disabled: false                    
                });
            },
            addFields() {
                this.form.fields[this.localeIndex].disabled = true;
                this.form.fields[this.localeIndex].remove = false;
                this.form.fields.push({
                    title: '',
                    content: '',
                    locale: null,
                    locales: this.getLocales(),
                    remove: true,
                    disabled: false
                });
            },
            removeFields(index) {
                this.localeIndex -= 1;
                this.form.fields[this.localeIndex].disabled = false;
                this.form.fields.splice(index, 1);
            },
            getLocales() {
                    var locales = Object.assign({}, this.form.fields[this.localeIndex].locales);
                    delete locales[this.form.fields[this.localeIndex].locale];
                    this.localeIndex += 1;
                    return locales;
            }
       
        }
    })
    
</script>
     
 @endsection