@extends('layouts.app')

@section('content')

<!-- Slider main container -->
<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach ($slides as $slide)
            
        <div class="slide swiper-slide">
            <div data-depth="0.4" class="slide-background">
                <img src="{{asset('images/slide/slide-background.jpg')}}" alt="">
            </div>
            <div data-depth="0.2" class="slide-item">
                <img src="{{asset('images/slide/drillbit.png')}}" alt="">
            </div>
            <div data-depth="0.2" data-input-element class="slide-header has-text-dark has-text-right">
                <h1 class="is-size-1 is-uppercase has-text-weight-bold">{{$slide->title}}</h1>
                <br>
                <h1 class="is-size-2 is-uppercase has-text-weight-light">{{$slide->content}}</h1>

                <hr>
                <a href="#" class="button is-primary is-outlined is-uppercase">Ətraflı öyrən</a>
            </div>
        </div>
        @endforeach

        
    </div>
</div>



<div style="height:1200px"></div>
@endsection