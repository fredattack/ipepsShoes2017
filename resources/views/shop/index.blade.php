@extends('layouts.shopLayout')

@section('title')
@endsection

@section('header')
    @include('shop.nav.header')
@endsection

@section('slider')
    @include('shop.slider.mainSlider')
@endsection

@section('asideLeft')
    @include('shop.nav.sideBar')
@endsection

@section('section')
    @include('shop.productIndex',['modeleList' => $modeleList, 'genderList' => $genderList, 'reductionList' => $reductionList])
@endsection

@section('bottomSlider')
    @include('shop.slider.bottomSlider')
    @endsection
@section('footer')
    @include('shop.nav.footer')
@endsection