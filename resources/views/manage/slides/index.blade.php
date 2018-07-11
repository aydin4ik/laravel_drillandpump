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
        <div class="column is-one-quarter" v-for="slide in slides">
            <div class="card">
                <div class="slide-manage" :class="slide.enabled == 0 ? 'disabled' : ''">
                    <img src="{{asset('images/slide/slide-background.jpg')}}" alt="">            
                    <img class="item" src="{{asset('images/slide/drillbit.png')}}" alt="">
                </div>
                <div class="slide-status slide-content">
                    <h5 class="is-size-7 is-pulled-left" v-text="slide.enabled == 0 ? 'Enable Slide' : 'Disable Slide'"></h5>
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
                <div class="slide-content has-text-centered" style="min-height: 5rem">
                    <h1 class="title is-6">@{{slide.title}}</h1>
                    <h1 class="subtitle is-7">@{{slide.content}}</h1>
                </div>
                <hr class="card-divider">
                <div class="slide-content">                    
                        <div class="field is-grouped is-grouped-multiline">
                                <div class="control">
                                    <div class="tags has-addons">
                                    <span class="tag is-danger"><i class="fa fa-user-o"></i></span>
                                    <span class="tag is-light">Aydin</span>
                                    </div>
                                </div>                                  
                                <div class="control">
                                    <div class="tags has-addons">
                                    <span class="tag is-danger"><i class="fa fa-clock-o"></i></span>
                                    <span class="tag is-light is-fullwidth">@{{slide.created_at}}</span>
                                    </div>
                                </div>
                                <div class="control">
                                    <div class="tags has-addons">
                                    <span class="tag is-danger"><i class="fa fa-star-o"></i></span>
                                    <span class="tag is-light is-fullwidth" v-text="slide.enabled == 0 ? 'Inactive' : 'Active'"></span>
                                    </div>
                                </div>
                        </div>
                </div>
                <hr class="card-divider">
                <div class="slide-content">
                    <a href="#" class="button is-primary  is-fullwidth is-small">Edit</a>
                    <button class="button is-danger  is-fullwidth is-small m-t-5" @click="confirmDelete(slide)">Delete</button>
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
        this.fetchSlides()
    },
    methods: {
        fetchSlides() {
            this.loading = true;
            axios.get(route('slides.fetch'))
                .then((response)  =>  {
                    this.loading = false;
                    this.slides = response.data;
                }, (error)  =>  {
                    this.loading = false;
                })
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
                title: 'Deleting Slide',
                type: 'is-danger',
                message: 'Are you sure you want to <b>delete</b> ' + slide.title + '? This action cannot be undone.',
                confirmText: 'Delete Slide',
                hasIcon: true,
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