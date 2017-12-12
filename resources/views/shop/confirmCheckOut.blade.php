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
    @include('shop.nav.sideBar')
@endsection

@section('section')

    <h1>Confirmation de commande</h1>
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
    {{--todo afficher info Order--}}
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
@endsection

@section('bottomSlider')
{{--    @include('shop.slider.bottomSlider')--}}
    @endsection
@section('footer')
    @include('shop.nav.footer')
@endsection