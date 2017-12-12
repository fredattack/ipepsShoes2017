@extends('layouts.shopLayout')

@section('title')
@endsection

@section('header')
    {!! NoCaptcha::renderJs() !!}
    @include('shop.nav.header')
@endsection

@section('slider')
    {{--@include('shop.slider.mainSlider')--}}
@endsection

@section('asideLeft')
    {{--@include('shop.nav.sideBar')--}}
@endsection

@section('section')
    <div id="contact-page" class="container">
        <div class="bg">

            <div class="row" style="margin-bottom: 2em;">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Nous Contacter</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        {{Form::open(array('route' => 'sendMessage'))}}

                            <div class="form-group col-md-6">
                                <input type="text" name="nom" onKeyUp="showButton()" placeholder="Nom" class="form-control">
                                {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="email" onKeyUp="showButton()" placeholder="email" class="form-control">
                                {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" onKeyUp="showButton()" placeholder="sujet" class="form-control">
                                {!! $errors->first('firstName', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Votre Message ici"></textarea>
                            </div>
                        {!! NoCaptcha::display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
    </span>
                        @endif
                        {!! Form::submit('Valider', ['class' => 'btn btn-primary pull-right']) !!}
                        {!! Form::close() !!}
                        {{--</form>--}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Info de Contact</h2>
                        <address>
                            <div class="companyinfo">
                                <h2><span>S</span>carpe<span>F</span>ine</h2>
                            </div>
                            <p>Avenue reine Astrid 12</p>
                            <p>4500 Huy</p>
                            <p>Mobile: +32476 17 38 93</p>
                            <p>Fax: 04 252 00 26</p>
                            <p>Email: info@ScarpeFine.be</p>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">Réseaux Sociaux</h2>
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/#contact-page-->
@endsection

@section('bottomSlider')
    {{--@include('shop.slider.bottomSlider')--}}
    @endsection
@section('footer')
    @include('shop.nav.footer')
@endsection