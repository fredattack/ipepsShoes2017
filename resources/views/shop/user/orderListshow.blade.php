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
    <div class="row">
        <div class="step-one">
         <h2 class="heading">Vos commandes </h2>
        </div>
    </div>

    {{--<div class="row"></div>--}}
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="prix">N°</td>
                        <td class="prix">Préparée</td>
                        <td class="description">Livrée</td>
                        <td class="prix">Total</td>
                        <td class="quantité">Date</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                @foreach($orderList as$orderReady )
                    <tr>
                        <td class="cart_product">
                            {{$orderReady->id}}
                        </td>
                        <td class="cart_total">
                            @if($orderReady->orderReady == 0)
                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                            @else
                                <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>
                            @endif
                        </td>
                        <td class="cart_total">
                            @if($orderReady->delivered == 0)
                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                            @else
                                <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>
                            @endif
                        </td>
                        <td class="cart_quantity">
                            {{$orderReady->totalProducts}}
                        </td>
                        <td class="cart_total">
                            {{$orderReady->created_at}}
                        </td>
                        <td class="cart_delete">
                            {!! Form::open(['method' => 'GET', 'route' => ['showOrderFront',  $orderReady->id]]) !!}
                            {{Form::button('<i class="fa fa-eye"> Détails</i>', ['type' => 'submit', 'class' => 'btn btn-flat cart_quantity_delete'] )  }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            </div>
        </div>
    </section>
    {{--</div>--}}
@endsection

@section('bottomSlider')
    {{--@include('shop.slider.bottomSlider')--}}
    @endsection
@section('footer')
    @include('shop.nav.footer')
@endsection