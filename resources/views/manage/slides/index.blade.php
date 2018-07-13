@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns">
        <div class="column">
            <h1 class="title is-4">Manage Slides</h1>
        </div>
        <div class="column">
            <a href="{{route('slides.create')}}" class="button is-primary is-pulled-right"><i class="m-r-15 fa fa-user-plus" aria-hidden="true"></i>Add new Slide</a>
        </div>
    </div>
    <hr>

    <div class="columns is-multiline" :class="loading ? 'is-loading' : ''" style="min-height: 400px">
        <div class="column is-one-quarter">
            <div class="slide-add is-size-1">
                <a href="{{route('slides.create')}}">
                    <span class="icon has-text-primary">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="column is-one-quarter" v-for="slide in slides">
            <div class="card">
                <div class="slide-card">
                    <div class="slide-head" :class="slide.enabled == 0 ? 'disabled' : ''">
                        <div class="slide-media">
                            <figure class="image is-16by9">
                                <img src="{{asset('images/slide/slide-background.jpg')}}" alt="">            
                            </figure>
                            <img class="item" src="{{asset('images/slide/drillbit.png')}}" alt="">
                        </div>
                    </div>
                    <div class="slide-body">
                        <div class="slide-content">
                            <h1 class="title">@{{slide.title}}</h1>
                            <h1 class="subtitle">@{{slide.content}}</h1>
                        </div>
                        <hr class="card-divider">
                        <div class="slide-status">
                                <h1 class="subtitle is-pulled-left" v-text="slide.enabled == 0 ? 'Enable Slide' : 'Disable Slide'"></h1>
                                <b-switch 
                                    class="is-pulled-right"
                                    @input="changeStatus(slide)"
                                    size="is-small"
                                    true-value="1"
                                    false-value="0"
                                    v-model="slide.enabled">
                                </b-switch>
                                <div class="clearfix"></div>
                        </div>

                        <hr class="card-divider">

                        <div class="slide-translations">
                            <h1 class="subtitle is-pulled-left">show translations <i class="fa fa-caret-down"></i></h1>
                            <div class="clearfix"></div>
                            <div class="translations">
                                <h1 class="subtitle" v-for="translation in slide.translations">@{{translation.content}}</h1>
                            </div>
                        </div>

                        <hr class="card-divider">

                        <div class="slide-actions">
                            <h1 class="subtitle is-pulled-left"><i class="fa fa-user"></i> @{{slide.user.name}}</h1>
                            <button class="button is-light is-small is-pulled-right m-l-5" @click="confirmDelete(slide)"><i class="fa fa-trash"></i></button>
                            <a :href="slide.href" class="button is-light is-small is-pulled-right"><i class="fa fa-pencil"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script>
    var app = new Vue({
    el: '#app',

    data: {
        slides: [],
        loading: false,
    },
    mounted: function() {
        this.fetchSlides();
    },
    methods: {
        setHref(){
            this.slides.forEach(element => {
                element.href = route('slides.edit', element.id);                
            });
        },
        fetchSlides() {
            this.loading = true;
            axios.get(route('slides.fetch'))
                .then((response)  =>  {
                    this.loading = false;
                    this.slides = response.data;
                    this.setHref();
                }, (error)  =>  {
                    this.loading = false;
                });
        },
        changeStatus(slide){
            this.loading = true;
            axios.patch(route('slides.update', slide.id), {
                slide: slide
            })
                .then((response) => {
                    this.loading = false;
                    this.fetchSlides();
                }, (error) => {
                    this.loading = false;
                })
        },
        confirmDelete(slide) {
            this.$dialog.confirm({
                type: 'is-danger',
                size: 'is-small',
                message: 'Are you sure you want to delete slide "<b> ' + slide.title + ' </b>" ? This action cannot be undone.',
                confirmText: 'Delete Slide',
                onConfirm: () => this.deleteSlide(slide)
            });

        },
        deleteSlide(slide){
            this.loading = true;
            axios.delete(route('slides.destroy', slide.id))
                .then((response) => {
                    this.loading = false;
                    this.fetchSlides();
                }, (error) => {
                    this.loading = false;
                })
        }
    }
})
</script>
    
@endsection