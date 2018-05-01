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
@php($user=Auth::user())
    <div class="row" style="margin-bottom: 1em;">
        <a href="javascript:history.back()" class="btn btn-primary  btn-lg pull-right">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>

<div class="container">
    <div class="row">
        <div class="step-one">
            <h2 class="heading">Commande n°:{{$order->id}}</h2>
        </div>
        <div class="col-lg-6 col-xs-12">

                        <p>N° de commande:  <b>{{$order->id}}</b></p>
                        <p>Date:            <b>{{date("d-m-Y", strtotime($order->created_at))}}</b></p>
                        <p>Total produits:           <b>{{$order->totalProducts}}</b></p>
                        <p>Préparation:
                        @if($order->orderReady==0)
                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                        @else
                                <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>
                        @endif</p>
                        <p>N°de livraison:
                            @if($order->delivered==0)
                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                            @else  <b>{{$order->idShipment}}</b>
                            @endif
                        </p>
                        <p>N° de Tracking:
                        @if($order->delivered==1)
                                <b>H1526D1569</b>
                        @else
                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                        @endif

                        </p>

        </div>
        <div class="col-lg-6 col-xs-12">



               <div class="col-xs-12 col-lg-6">
                    <p>N° de client: <b>{{$order->user->id}}</b></p>
                    <p>Nom: <b>{{$order->user->lastName}}</b></p>
                    <p>Prénom: <b>{{$order->user->firstName}}</b></p>
                   <P>Email: <b>{{$order->user->email}}</b></P>
               </div>

                <div class="col-xs-12 col-lg-6">

                  <p>Adresse de facturation:<br>

                    <b>{{$order->user->adress
                    ->where('id', '=', $order->user->idFactAdress)
                    ->first()->name  }}
                    <br/>
                        {{$order->user->adress
                    ->where('id', '=', $order->user->idFactAdress)
                    ->first()->street . "&nbsp;"}}

                        {{$order->user->adress
                    ->where('id', '=', $order->user->idFactAdress)
                    ->first()->number }}<br>

                    {{$order->user->adress
                    ->where('id', '=', $order->user->idFactAdress)
                    ->first()->postCode."&nbsp; "}}

                    {{$order->user->adress
                    ->where('id', '=', $order->user->idFactAdress)
                    ->first()->city }}<br>

                    {{$order->user->adress
                    ->where('id', '=', $order->user->idFactAdress)
                    ->first()->country}}</b>

                </p>

                <br>
                <p>Adresse de livraison:<br>
{{--                    @if($order->idAdress==$order->user->idFactAdress) <b>Idem</b>--}}
                    {{--@else--}}
                    <b>{{$adress->name}}
                        <br/>
                        {{$adress->street . "&nbsp;"}}
                        {{$adress->number }}<br>
                        {{$adress->postCode."&nbsp; "}}
                        {{$adress->city }}<br>
                        {{$adress->country}};



                        {{--@endif--}}
               </p>
            </div>
        </div>
    </div>


<div class="row">
    <section id="cart_items">
        <div class="container">
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
                                    <?php
                                    if($productTemp->Shoe->Modele->idReduction==1)
                                        $prixUnit= $productTemp->Shoe->Modele->price;
                                    else
                                        $prixUnit=$productTemp->Shoe->Modele->price-$productTemp->Shoe->Modele->price*$productTemp->Shoe->Modele->reduction->value/100;
                                    ?>
                                </td>

                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                     <h4>{{$productTemp->quantity}} </h4>
                                    </div>
                                </td>

                                <td class="cart_total">
                                    @php($sousTotalItem=$prixUnit*$productTemp->quantity)
                                    <p class="cart_total_price">{{number_format ($sousTotalItem,2)}} €</p>
                                </td>

                                <td class="cart_delete">

                                </td>
                            </tr>
                            @php($sousTotal+=$sousTotalItem)
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-sm-6 pull-right">
                        <div class="total_area" >
                            <ul>
                                @if($user->idFactAdress!=null)
                                    <li>Sous-Total<span>{{number_format ($sousTotal,2)}} €</span></li>
                                    <li>Frais de livraison<span>
                        <?php
                                            $deliveryCost=$adress->deliveryCost
                                            ?>
                                            {{number_format ($deliveryCost,2)}} €
                    </span></li>
                                    <li>Total <span> {{number_format ($deliveryCost+$sousTotal,2)}} €</span></li>
                                    {{--<li>Total <span>--}}
                                    {{--{{number_format ($sousTotal,2)}} €--}}
                                    {{--</span></li>--}}
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
        </div>


        </section> <!--/#cart_items-->
</div>
</div>

    @endif
@endsection

@section('bottomSlider')
    {{--@include('shop.slider.bottomSlider')--}}
@endsection
@section('footer')
    @include('shop.nav.footer')

@endsection