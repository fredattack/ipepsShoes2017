@extends('layouts.shopLayout')

@section('title')
@endsection

@section('header')
    @include('shop.nav.header')
@endsection

@section('slider')
    {{--@include('shop.slider.mainSlider')--}}
@endsection

@section('asideLeft')
@endsection

@section('section')
    <div class='container'>
        <div class="alert alert-success">
            <strong>Merci!</strong>  Votre paiement a bien été enregistré.
        </div>
    </div>
@endsection

@section('bottomSlider')
{{--    @include('shop.slider.bottomSlider')--}}
    @endsection
@section('footer')
    @include('shop.nav.footer')
@endsection