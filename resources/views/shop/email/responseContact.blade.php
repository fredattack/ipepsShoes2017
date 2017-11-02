@extends('layouts.shopLayout')

@section('title')
@endsection

@section('header')
    @include('shop.nav.header')
@endsection

@section('slider')
{{--    @include('shop.slider.mainSlider')--}}
@endsection

@section('asideLeft')
    {{--@include('shop.nav.sideBar')--}}
@endsection

@section('section')
    <div class="col-lg-12" style="min-height: 30em">
        <div class="alert alert-success" id="alertMessage">
            <strong>Merci</strong> Votre message a bien été envoyé, nous vous répondrons dans les plus brefs délais.
        </div>
    </div>
@endsection

@section('bottomSlider')
    {{--@include('shop.slider.bottomSlider')--}}
    @endsection
@section('footer')
    @include('shop.nav.footer')
@endsection