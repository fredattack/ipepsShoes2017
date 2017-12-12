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
    <div class="container">
        <section id="cart_items">
            <div class="container">
                <div class="col-lg-4"><h1>info</h1></div>
                <div class="col-lg-4"><h1>facturation</h1></div>
                <div class="col-lg-4"><h1>Livraison</h1></div>


                @if(count($productTempList)==0)
                    <div class="alert alert-success" style="margin-bottom: 11em">
                        <ul>
                            <li>Votre Panier est vide</li>
                        </ul>
                    </div>
                @else
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                            <tr class="cart_menu">
                                <td class="image">Article</td>
                                <td class="description"></td>
                                <td class="prix">Prix</td>
                                <td class="quantité">Quantité</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>@php($sousTotal=0)
                            @foreach($productTempList as $productTemp )
                                <tr>
                                    <td class="cart_product">
                                        <?php
                                        $nom=$productTemp->Shoe->Modele->image;
                                        $src=asset("/image/$nom");
                                        ?>
                                        <a class="imageCart" href=""><img src="{{$src}}" alt="" width="80em"></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{$productTemp->Shoe->Modele->name}} {{$productTemp->Shoe->Modele->gender->name}} T: {{$productTemp->Shoe->size}}  </a></h4>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{$productTemp->Shoe->Modele->price}} €</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <p>{{$productTemp->quantity}}</p>

                                    </td>
                                    <td class="cart_total">
                                        @php($sousTotalItem=$productTemp->Shoe->Modele->price*$productTemp->quantity)
                                        <p class="cart_total_price">{{number_format ($sousTotalItem,2)}} €</p>
                                    </td>
                                </tr>
                                @php($sousTotal+=$sousTotalItem)
                            @endforeach
                            </tbody>
                        </table>

                    </div>
            </div>
            <div class="row">

                <div class="col-sm-6 pull-right">
                    <div class="total_area" >
                        <ul>
                            @if($user->idFactAdress!=null)
                                <li>Sous-Total<span>{{number_format ($sousTotal,2)}} €</span></li>
                                <li>Frais de livraison:<span>
                        <?php
                                        $deliveryCost=$user->adress
                                            ->where('id', '=', $user->idShipAdress1)
                                            ->first()->deliveryCost;
                                        $total=$deliveryCost+$sousTotal

                                        ?>
                                        {{number_format ($deliveryCost,2)}} €
                    </span></li>
                                <li>Total <span> {{number_format ($total,2)}} €</span></li>
                            @else
                                <li>Sous-Total<span>{{number_format ($sousTotal,2)}} €</span></li>
                                <li>Frais de livraison<span>


                    A calculer
                        </span></li>
                                <li>Total <span>
                         {{number_format ($sousTotal,2)}} €
                        </span></li>
                            @endif
                        </ul>


                    </div>
                </div>
            </div>
            @endif
        </section> <!--/#cart_items-->

                    @if ($message = Session::get('success'))
                        <div class="custom-alerts alert alert-success fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            {!! $message !!}
                        </div>
                        <?php Session::forget('success');?>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="custom-alerts alert alert-danger fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            {!! $message !!}
                        </div>
                        <?php Session::forget('error');?>
                    @endif

                        <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('addmoney.paypal') !!}" >
                            {{ csrf_field() }}

                            {{--<?php $count =0;?>--}}
                            {{--@foreach($productTempList as $productTemp)--}}
                                {{--<?php $count++; ?>--}}
                                {{--<input type="hidden" name="item_name_{{$count}}" value="{{$productTemp->Shoe->Modele->name}} {{$productTemp->Shoe->Modele->gender->name}} T: {{$productTemp->Shoe->size}}">--}}
                                {{--<input type="hidden" name="quantity_{{$count}}" value="{{$productTemp->quantity}}">--}}
                                {{--<input type="hidden" name="amount_{{$count}}" value="{{$productTemp->Shoe->Modele->price}}">--}}
                        {{--@endforeach--}}
                            {{--<input type="hidden" name="deliveryCost" value="{{$deliveryCost}}">--}}
                            {{--<input type="hidden" name="amount" value="125">--}}
                            {{--<input type="hidden" name="count" value="{{$count}}">--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-sm-6 pull-right">--}}
                                    <button type="submit" class="btn btn-primary  check_out pull-right">
                                        Payer avec Paypal
                                    </button>
                                {{--</div>--}}
                            {{--</div>--}}
                        </form>
    </div>


        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-8 col-md-offset-2">--}}
                    {{--<div class="panel panel-default">--}}
                        {{--@if ($message = Session::get('success'))--}}
                            {{--<div class="custom-alerts alert alert-success fade in">--}}
                                {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>--}}
                                {{--{!! $message !!}--}}
                            {{--</div>--}}
                            {{--<?php Session::forget('success');?>--}}
                        {{--@endif--}}
                        {{--@if ($message = Session::get('error'))--}}
                            {{--<div class="custom-alerts alert alert-danger fade in">--}}
                                {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>--}}
                                {{--{!! $message !!}--}}
                            {{--</div>--}}
                            {{--<?php Session::forget('error');?>--}}
                        {{--@endif--}}
                        {{--<div class="panel-heading">Paywith Paypal</div>--}}
                        {{--<div class="panel-body">--}}
                            {{--<form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('addmoney.paypal') !!}" >--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">--}}
                                    {{--<label for="amount" class="col-md-4 control-label">Amount</label>--}}
                                    {{--<div class="col-md-6">--}}
                                        {{--<input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>--}}
                                        {{--@if ($errors->has('amount'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('amount') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<div class="col-md-6 col-md-offset-4">--}}
                                        {{--<button type="submit" class="btn btn-primary">--}}
                                            {{--Paywith Paypal--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


@endsection

@section('bottomSlider')
{{--    @include('shop.slider.bottomSlider')--}}
    @endsection
@section('footer')
    @include('shop.nav.footer')
@endsection