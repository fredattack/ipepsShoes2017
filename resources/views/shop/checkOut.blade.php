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
                    <p>Information sur l'acheter</p>
                    {{--<form>--}}
                    {{Form::open(array('route' => 'checkOutAdress'))}}

                        <input type="text" name="firstName" onKeyUp="showButton()" placeholder="Prénom" value="{{$user->firstName}}">
                        {!! $errors->first('firstName', '<small class="help-block">:message</small>') !!}
                        <input type="text" name="lastName" onKeyUp="showButton()" placeholder="Nom" value="{{$user->lastName}}">
                        {!! $errors->first('firstName', '<small class="help-block">:message</small>') !!}
                        <input type="text" name="login" onKeyUp="showButton()" placeholder="User Name" value="{{$user->login}}">
                        {!! $errors->first('firstName', '<small class="help-block">:message</small>') !!}
                       <input type="email" name="email" onKeyUp="showButton()" placeholder="votre Email" value="{{$user->email}}">
                        {!! $errors->first('firstName', '<small class="help-block">:message</small>') !!}
                    {{--</form>--}}
                    {{--<a class="btn btn-primary" href="">Continue</a>--}}
                </div>
            </div>
            <div class="col-sm-5 clearfix">
                <div class="bill-to">
                    {{--<p>Bill To</p>--}}
                    <div class="form-one">
                        <p>Adresse de Facturation</p>
                        {{--<form>--}}

                    @if($user->idFactAdress==null)
                                <input type="text" name="factAdress_name" onKeyUp="showButton()" placeholder="Nom">
                                {!! $errors->first('factAdress_name', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="factAdress_street" placeholder="Rue" onKeyUp="showButton()">
                                {!! $errors->first('factAdress_street', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="factAdress_number" placeholder="Numéro" onKeyUp="showButton()">
                                {!! $errors->first('factAdress_number', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="factAdress_postCode" placeholder="Code Postal" onKeyUp="showButton()">
                                {!! $errors->first('factAdress_postCode', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="factAdress_city" placeholder="Localité" onKeyUp="showButton()">
                                {!! $errors->first('factAdress_city', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="factAdress_country" placeholder="Pays" onKeyUp="showButton()">
                                {!! $errors->first('factAdress_country', '<small class="help-block">:message</small>') !!}

                            @else
                            <input type="text" name="factAdress_name" placeholder="Nom" value="{{$user->adress
                                     ->where('id', '=', $user->idFactAdress)
                                    ->first()->name}}">
                                {!! $errors->first('factAdress_name', '<small class="help-block">:message</small>') !!}

                            <input type="text" name="factAdress_street" placeholder="Rue" value="{{$user->adress
                                     ->where('id', '=', $user->idFactAdress)
                                    ->first()->street}}">
                                {!! $errors->first('factAdress_street', '<small class="help-block">:message</small>') !!}

                            <input type="text" name="factAdress_number" placeholder="Numéro" value="{{$user->adress
                                     ->where('id', '=', $user->idFactAdress)
                                    ->first()->number}}">
                                {!! $errors->first('factAdress_number', '<small class="help-block">:message</small>') !!}

                            <input type="text" name="factAdress_postCode" placeholder="Code Postal" value="{{$user->adress
                                     ->where('id', '=', $user->idFactAdress)
                                    ->first()->postCode}}">
                                {!! $errors->first('factAdress_postCode', '<small class="help-block">:message</small>') !!}

                            <input type="text" name="factAdress_city" placeholder="Localité" value="{{$user->adress
                                     ->where('id', '=', $user->idFactAdress)
                                    ->first()->city}}">
                                {!! $errors->first('factAdress_city', '<small class="help-block">:message</small>') !!}

                            <input type="text" name="factAdress_country" placeholder="Pays" value="{{$user->adress
                                     ->where('id', '=', $user->idFactAdress)
                                    ->first()->country}}">
                                {!! $errors->first('factAdress_country', '<small class="help-block">:message</small>') !!}

                            @endif
                        {{--</form>--}}
                    </div>
                    <div class="form-two" id="shipAdressBlock">
                        <p>Adresse de Livraison</p>

                        {{--<form>--}}
                            @if($user->idShipAdress1==null)
                                <input type="text" name="shipAdress_name" onKeyUp="showButton()" placeholder="Nom">
                                {!! $errors->first('shipAdress_name', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="shipAdress_street" placeholder="Rue" onKeyUp="showButton()">
                                {!! $errors->first('shipAdress_street', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="shipAdress_number" placeholder="Numéro" onKeyUp="showButton()">
                                {!! $errors->first('shipAdress_number', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="shipAdress_postCode" placeholder="Code Postal" onKeyUp="showButton()">
                                {!! $errors->first('shipAdress_postCode', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="shipAdress_city" placeholder="Localité" onKeyUp="showButton()">
                                {!! $errors->first('shipAdress_city', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="shipAdress_country" placeholder="Pays" onKeyUp="showButton()">
                                {!! $errors->first('shipAdress_country', '<small class="help-block">:message</small>') !!}

                            @else
                                <input type="text" name="shipAdress_name" placeholder="Nom" value="{{$user->adress
                                                                                                            ->where('id', '=', $user->idShipAdress1)
                                                                                                            ->first()->name}}">
                                {!! $errors->first('shipAdress_name', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="shipAdress_street" placeholder="Rue" value="{{$user->adress
                                     ->where('id', '=', $user->idShipAdress1)
                                    ->first()->street}}">
                                {!! $errors->first('shipAdress_street', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="shipAdress_number" placeholder="Numéro" value="{{$user->adress
                                     ->where('id', '=', $user->idShipAdress1)
                                    ->first()->number}}">
                                {!! $errors->first('shipAdress_number', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="shipAdress_postCode" placeholder="Code Postal" value="{{$user->adress
                                     ->where('id', '=', $user->idShipAdress1)
                                    ->first()->postCode}}">
                                {!! $errors->first('shipAdress_postCode', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="shipAdress_city" placeholder="Localité" value="{{$user->adress
                                     ->where('id', '=', $user->idShipAdress1)
                                    ->first()->city}}">
                                {!! $errors->first('shipAdress_city', '<small class="help-block">:message</small>') !!}

                                <input type="text" name="shipAdress_country" placeholder="Pays" value="{{$user->adress
                                     ->where('id', '=', $user->idShipAdress1)
                                    ->first()->country}}">
                                {!! $errors->first('shipAdress_country', '<small class="help-block">:message</small>') !!}

                            @endif
                        {{--</form>--}}
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="order-message">
                    <p>Remarque sur la livraison</p>
                    <textarea name="message"  placeholder="" rows="16"></textarea>
                    @if($user->idShipAdress1==$user->idFactAdress)
                        <label><input id="sameAdressCheckBox" name="sameAdress" type="checkbox" checked> Livrer à l'adresse de facturation</label>
                    @else
                         <label><input id="sameAdressCheckBox" name="sameAdress" type="checkbox"> Livrer à l'adresse de facturation</label>
                    @endif

                    {!! Form::submit('Valider', ['class' => 'btn btn-default check_out pull-right']) !!}
                    {!! Form::close() !!}
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

        <h1>paiement</h1>

        {!! Form::open(['method' => 'GET', 'route' => ['payOut',$total]]) !!}
        {!! Form::submit('Payer' , ['class' => 'btn btn-default check_out pull-right' ])  !!}
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
            $('#paiement-mode').css('display','none');
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
    </script>
@endsection