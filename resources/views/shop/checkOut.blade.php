@extends('layouts.shopLayout')

@section('title')
@endsection

@section('header')
    @include('shop.nav.header')
@endsection

@section('slider')

@endsection

@section('asideLeft')
@endsection

@section('section')
{{--<script>location.reload()</script>--}}

    <div class="row">
    <a href="javascript:history.back()" class="btn btn-default get pull-right">
        <span class="glyphicon glyphicon-circle-arrow-left"></span>
        Retour
    </a>
    </div>
    <div class="step-one">
        <h2 class="heading">Etape 1 <small>Vos Coordonées</small></h2>
    </div>

    <!-- Info Client-->
    <div class="shopper-informations">
        <div class="row">
            <div class="col-sm-3">
                <div class="shopper-info">
                    <p>Nom    : <b>{{$user->lastName}}</b></p>
                    <p>Prénom : <b>{{$user->firstName}}</b></p>
                    <p>Email  : <b>{{$user->email}}</b></p>
                    <a  href="{{route('showUserInfo',$user->id)}}" class="btn btn-primary  pull-right"   >
                        Modifier
                    </a>
                </div>
            </div>
            <div class="col-sm-5 clearfix">
                <div class="bill-to" >
                    {{--<p>Bill To</p>--}}
                    <div class="box" style="margin-bottom: 3em">
                        <p>Adresse de Facturation</p>
                        {{--<form>--}}

                    @if($user->idFactAdress==null)
                            <a  href="{{route('showAdressListFront',$user->id)}}" class="btn btn-primary  pull-right" >
                                Ajouter une adresse
                            </a>
                            @else
                            <h4>{{$user->adress
                                ->where('id', '=', $user->idFactAdress)
                                ->first()->name}}</h4>
                        <p>{{$user->adress
                                ->where('id', '=', $user->idFactAdress)
                                ->first()->street}} {{$user->adress
                                ->where('id', '=', $user->idFactAdress)
                                ->first()->number}}</p>
                            <p>{{$user->adress
                                ->where('id', '=', $user->idFactAdress)
                                ->first()->postCode}} {{$user->adress
                                ->where('id', '=', $user->idFactAdress)
                                ->first()->city}}</p>
                            <p>{{$user->adress
                                ->where('id', '=', $user->idFactAdress)
                                ->first()->country}}</p>



                            @endif
                        {{--</form>--}}
                    </div>
                    <div class="box" id="shipAdressBlock">
                        <p>Adresse de Livraison</p>

                        {{--<form>--}}
                            @if($user->idShipAdress1==null)
                            <a  href="{{route('showAdressListFront',$user->id)}}" class="btn btn-primary  pull-right">
                                Ajouter une adresse
                            </a>

                                @elseif($user->idShipAdress1== $user->idFactAdress)
                                <h4>idem</h4>
                            @else
                            <h4>{{$user->adress
                                ->where('id', '=', $user->idShipAdress1)
                                ->first()->name}}</h4>
                            <p>{{$user->adress
                                ->where('id', '=', $user->idShipAdress1)
                                ->first()->street}} {{$user->adress
                                ->where('id', '=', $user->idShipAdress1)
                                ->first()->number}}</p>
                            <p>{{$user->adress
                                ->where('id', '=', $user->idShipAdress1)
                                ->first()->postCode}} {{$user->adress
                                ->where('id', '=', $user->idShipAdress1)
                                ->first()->city}}</p>
                            <p>{{$user->adress
                                ->where('id', '=', $user->idShipAdress1)
                                ->first()->country}}</p>


                            @endif
                        @if($user->idShipAdress1!=null || $user->idFactAdress!=null)
                        <a  href="{{route('showAdressListFront',$user->id)}}" class="btn btn-primary  pull-right" onclick="newSession()">
                            Modifier
                        </a>
                        {{--</form>--}}
                            @endif
                    </div>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="order-message">
                    <p>Remarque sur la livraison</p>
                    <textarea name="message"  placeholder="" rows="5"></textarea>
                    @if($user->idShipAdress1!=null && $user->idFactAdress!=null)

                    <a href="{{route('checkOutAdress')}}" class='btn btn-default check_out pull-right'>Valider</a>
@endif

                </div>
            </div>
        </div>
    </div>
    <!--Fin Info Client-->

    <div class="step-one">
        <h2 class="heading">Etape 2  <small>Votre panier</small></h2>
    </div>
    <!-- Tableau d'items -->
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

                            <p>{{number_format ($prixUnit,2)}} </p>
                        </td>
                        <td class="cart_quantity">
                            <p>{{$productTemp->quantity}}</p>

                        </td>
                        <td class="cart_total">
                            @php($sousTotalItem=$prixUnit*$productTemp->quantity)
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
            <a class="btn btn-default check_out pull-right " style="margin-bottom: 2em;margin-right: 0em" href="{{route('checkOutCart')}}">Valider</a>
            <a class="btn btn-default check_out pull-right" style="margin-bottom: 2em;margin-right: 0em" href="{{route('cart')}}">Modifier</a>

        </div>
    </div>
</div>
        @endif
    </section> <!--/#cart_items-->

    <!-- Info Payement -->
    <div class="step-one">
        <h2 class="heading">Etape 3 <small>Modes de paiement</small></h2>
    </div>

    <section id="paiement-mode">



        {{--{!! Form::open(['method' => 'GET', 'route' => ['payOut',$total]]) !!}--}}
        {!! Form::open(['method' => 'GET', 'route' => ['addmoney.paywithpaypal']]) !!}
{{--        {!! Form::open(['method' => 'GET', 'route' => ['payPremium']]) !!}--}}

        <input type="image" src="{{asset("/image/paypalLogo.jpg")}}" width="452" height="152" alt="Submit" class="pull-right" />
        {!! Form::close() !!}

        {{--<a class="btn btn-default check_out pull-right " style="margin-bottom: 2em" href="{{route('payOut')}}">Payer</a>--}}

    </section>
@endsection

@section('bottomSlider')
@endsection
@section('footer')
    @include('shop.nav.footer')
    @if (\Session::has('danger'))
        <div class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('danger') !!}</li>
            </ul>
        </div>
    @endif
    @if($step==1)
        <script>
            $('#cart_items').css('display','none');
            $('#paiement-mode').css('display','none');
        </script>
    @elseif($step==2)
        <script>
            window.scrollBy(0,200 );
            $('.shopper-informations').css('display','none');
            $('#paiement-mode').css('display','none');
        </script>
    @elseif($step==3)
        <script>
            window.scrollBy(0,400 );
            $('.shopper-informations').css('display','none');
            $('#cart_items').css('display','none');
        </script>
    @endif


    <script>
        $(document).ready(function(){
            $('#cartLink').addClass('active');
            $('#saveButton').css('display','none');
            if($('#sameAdressCheckBox').is(":checked")) {
                $('#shipAdressBlock').css('display','none');

            }
            else{

                $('#shipAdressBlock').css('display','block');
            }
        });
    function showButton(){
        $('#saveButton').css('display','block');
        var checkSave = false;
    }
        $('#sameAdressCheckBox').change(function() {
//            alert('test');
            if($(this).is(":checked")) {
                $('#shipAdressBlock').css('display','none');

            }
            else{

                $('#shipAdressBlock').css('display','block');
            }
            //'unchecked' event code
        });
    function newSession(){

    }
    </script>
@endsection