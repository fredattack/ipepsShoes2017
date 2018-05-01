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

    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h3>Laravel 5 - Payment Using Paypal</h3>
            </div>
        </div>

        <div class="row db-padding-btm db-attached">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="db-wrapper">
                    {!! Form::open(array('route' => 'getCheckout')) !!}
                    {!! Form::hidden('type','small') !!}
                    {!! Form::hidden('pay',30) !!}
                    <div class="db-pricing-eleven db-bk-color-one">
                        <div class="price">
                            <sup>$</sup>30
                            <small>per quarter</small>
                        </div>
                        <div class="type">
                            SMALL PLAN
                        </div>
                        <ul>
                            <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                            <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                            <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                        </ul>
                        <div class="pricing-footer">
                            <button class="btn db-button-color-square btn-lg">BOOK ORDER</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="db-wrapper">
                    {!! Form::open(array('route' => 'getCheckout')) !!}
                    {!! Form::hidden('type','medium') !!}
                    {!! Form::hidden('pay',45) !!}
                    <div class="db-pricing-eleven db-bk-color-two popular">
                        <div class="price">
                            <sup>$</sup>45
                            <small>per quarter</small>
                        </div>
                        <div class="type">
                            MEDIUM PLAN
                        </div>
                        <ul>
                            <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                            <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                            <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                        </ul>
                        <div class="pricing-footer">
                            <button class="btn db-button-color-square btn-lg">BOOK ORDER</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="db-wrapper">
                    {!! Form::open(array('route' => 'getCheckout')) !!}
                    {!! Form::hidden('type','advance') !!}
                    {!! Form::hidden('pay',68) !!}
                    <div class="db-pricing-eleven db-bk-color-three">
                        <div class="price">
                            <sup>$</sup>68
                            <small>per quarter</small>
                        </div>
                        <div class="type">
                            ADVANCE PLAN
                        </div>
                        <ul>
                            <li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
                            <li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
                            <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>
                        </ul>
                        <div class="pricing-footer">
                            <button class="btn db-button-color-square btn-lg">BOOK ORDER</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottomSlider')
    @include('shop.slider.bottomSlider')
    @endsection
@section('footer')
    @include('shop.nav.footer')
@endsection