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
    <div class="row" style="margin-bottom: 1em;">
        <a href="javascript:history.back()" class="btn btn-primary  btn-lg pull-right">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
    <div class="step-one">
        <h2 class="heading">Changer Votre Mot de passe</h2>
    </div>
    <div class="container" style="min-height: 1em;">

        <div class="col-lg-4 col-sm-12">

            {{ Form::open(['route' => 'updatePassword',
                                 'method'=> 'post',
                                 'class' => 'form-horizontal panel']) }}
            @if(session()->has('message'))

                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
             @elseif((session()->has('error')))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif

            <input  type="password" id="oldPassword" name="oldPassword" class="boxInput" placeholder="Ancien Mot de Passe" >
            {!! $errors->first('oldPassword', '<small class="help-block">:message</small>') !!}

            <input type="password" id="newPassword" name="newPassword" class="boxInput"  placeholder="Nouveau mot de passe" autofocus>
            {!! $errors->first('newPassword', '<small class="help-block ">:message</small>') !!}

            <input type="password" id="newPassword_confirmation" name="newPassword_confirmation" class="boxInput" placeholder="Confirmation" >
            {!! $errors->first('newPassword_confirmation', '<small class="help-block">:message</small>') !!}


            {!! Form::submit('Valider', ['class' => 'btn btn-default get pull-right']) !!}
            {!! Form::close() !!}

        </div>

    </div>
@endsection

@section('bottomSlider')
{{--    @include('shop.slider.bottomSlider')--}}
    @endsection
@section('footer')
    @include('shop.nav.footer')
@endsection