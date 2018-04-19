@extends('layouts.app')

@section('content')
<div id="scene" class="slide">
    <div data-depth="0.4" class="slide-background">
        <img src="{{asset('images/slide/slide-background.jpg')}}" alt="">
    </div>
    <div data-depth="0.2" class="slide-item">
        <img src="{{asset('images/slide/drillbit.png')}}" alt="">
    </div>
    <div data-depth="0.2" data-input-element class="slide-header has-text-dark has-text-right">
        <h1 class="is-size-1 is-uppercase has-text-weight-bold">Qazma Baltalari</h1>
        <br>
        <h1 class="is-size-2 is-uppercase has-text-weight-light">təqdim olunan qazma baltaları dünyanın aparıcı istehsalçılarından</h1>

        <hr>
        <a href="#" class="button is-primary is-outlined is-uppercase is-medium">Ətraflı öyrən</a>
    </div>
</div>

<div style="height:1200px"></div>
@endsection
