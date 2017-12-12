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
    {{--@include('shop.nav.sideBar')--}}
@endsection

@section('section')
    <div class="row" style="margin-bottom: 1em;">
        <a href="javascript:history.back()" class="btn btn-primary  btn-lg pull-right">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
    <div class="step-one">
        <h2 class="heading">Vos coordonnées </h2>
    </div>
<div class="container" style="min-height: 1em;">

    <div class="col-lg-4 col-sm-12 box">
        <p>Nom    : <b>{{$user->lastName}}</b></p>
        <p>Prénom : <b>{{$user->firstName}}</b></p>
        <p>Email  : <b>{{$user->email}}</b></p>
        <a  class="btn btn-primary  btn-lg pull-right" onclick="PassVal({{$user}})" data-toggle="modal" data-target="#editInfoUser">
             Modifier
        </a>

    </div>
    <div class="col-lg-4 col-sm-12 ">
        <a class="btn btn-primary  btn-lg pull-right" href="{{route('ChangePassword')}}">
            Modifier votre mot de passe
        </a>
    </div>
</div>
@endsection

@section('bottomSlider')
    {{--@include('shop.slider.bottomSlider')--}}
    @endsection
@section('footer')
    @include('shop.nav.footer')
        @include('shop.modal.editInfoUser')

        <script>
            function PassVal(res)
            {
                $('#modalForm').attr('action', 'http://ipepsshoes2017.dev/userUpdate/' +res['id']);
                $('#firstName').val(res['firstName']);
                $('#lastName').val(res['lastName']);
                $('#email').val(res['email']);
            }
        </script>
@endsection