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

    <div class="columns is-multiline">
            
        <div class="column is-one-quarter" v-for="slide in slides">
            <div class="box">
                <div class="slide-manage" :class="slide.enabled ? 'active' : 'disabled'">
                    <img src="{{asset('images/slide/slide-background.jpg')}}" alt="">            
                    <img class="item" src="{{asset('images/slide/drillbit.png')}}" alt="">
                    <b-switch 
                        size="is-small"
                        true-value="1"
                        false-value="0"
                        v-model="slide.enabled">
                    </b-switch>
                    <span 
                        class="tag" 
                        :class="slide.enabled ? 'is-success' : 'is-danger'"
                        v-text="slide.enabled ? 'enabled' : 'disabled'">
                    </span>                    
                </div>
                <div class="slide-body m-t-10">
                    <div class="columns">
                        <div class="column">
                            <h1 class="title is-6">@{{slide.title}}</h1>
                            <h1 class="subtitle is-7">@{{slide.content}}</h1>
                        </div>                                           
                    </div>
                </div>
                <div class="slide-actions m-t-5">
                    <div class="columns">
                        <div class="column">
                            <a href="" 
                                class="button is-danger is-pulled-right is-fullwidth"
                                @click.prevent="snackbar(slide.title)">
                                Delete
                            </a> 
                        </div> 
                        <div class="column">
                            <a href="" class="button is-primary is-pulled-right is-fullwidth">Edit</a>
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
        slides: @json($slides),
    },
    methods: {
        snackbar(title) {
                this.$snackbar.open({
                    message: "Are you sure to delete this Slide?",
                    duration: 5000,
                    type: 'is-danger',
                    onAction: () => {
                        this.$toast.open({
                            message: 'slide "' + title + '"  has been deleted'
                        })
                    }
                })
            },
    }
})
</script>
    
@endsection