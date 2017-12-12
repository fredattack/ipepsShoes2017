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
<div class="container" style="min-height: 24em;margin-top:4em;">
    <div class="col-lg-4 text-center">
       <div class="row">
            <a href="{{route('showListFront',['id' => Auth::user()->id])}}"><img src="/image/transport-cart.png" class="logoUserShow"/></a>
       </div>
       <div class="row companyinfo">
            <h2><span>V</span>os <span>C</span>ommandes</h2>
       </div>
    </div>

    <div class="col-lg-4 text-center">
        <div class="row">
            <a href="{{route('showUserInfo',['id' => Auth::user()->id])}}"><img src="/image/cardboard-box.png" class="logoUserShow"/> </a>
        </div>
        <div class="row companyinfo">
            <h2><span>V</span>os <span>I</span>nfos</h2>
        </div>
    </div>

    <div class="col-lg-4 text-center" >
        <div class="row">
            <a href="{{route('showAdressListFront',['id' => Auth::user()->id])}}"><img src="/image/house-with-chimney.png" class="logoUserShow"/></a>
        </div>
        <div class="row companyinfo">
            <h2><span>A</span>dresses</h2>
        </div>
    </div>

</div>

@endsection

@section('bottomSlider')
    @endsection
@section('footer')
    @include('shop.nav.footer')
    <script>
        $('#shipAdressBlock').css('display','block');
    </script>
@endsection