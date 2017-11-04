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

    <div class="row">
        <div class="step-one">
            <h2 class="heading">Vos coordonnées </h2>
        </div>
    </div>

    <!-- Info Client-->
    <div class="shopper-informations">
        <div class="row">
            <div class="col-sm-4">
                <div class="shopper-info">
                    <p>Information sur l'acheter</p>
                    {{--<form>--}}
                    {{Form::open(array('route' => 'updateUser'))}}

                    <input type="text" name="firstName" onKeyUp="showButton()" placeholder="Prénom" value="{{$user->firstName}}">
                    {!! $errors->first('firstName', '<small class="help-block">:message</small>') !!}
                    <input type="text" name="lastName" onKeyUp="showButton()" placeholder="Nom" value="{{$user->lastName}}">
                    {!! $errors->first('firstName', '<small class="help-block">:message</small>') !!}
                    <input type="email" name="email" onKeyUp="showButton()" placeholder="votre Email" value="{{$user->email}}">
                    {!! $errors->first('firstName', '<small class="help-block">:message</small>') !!}
                   <a href="" class="btn btn-primary">Changer de mot de pass</a>
                    {{--</form>--}}
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="bill-to">
                    {{--<p>Bill To</p>--}}
                    <div class="form-one" style="width: 100%">
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

                            <p>Frais de livraison: {{$user->adress
                                     ->where('id', '=', $user->idFactAdress)
                                    ->first()->deliveryCost}}</p>
                        @endif


                        {{--</form>--}}
                    </div>
                </div>

            </div>
                    <div class="col-sm-4">
                        <div class="bill-to">
                    <div class="form-two" id="shipAdressBlock" style="width: 100%">
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

                            <p>Frais de livraison: {{$user->adress
                                     ->where('id', '=', $user->idShipAdress1)
                                    ->first()->deliveryCost}}</p>

                        @endif

                    </div>
                    {{--<div class="row">--}}
                        {!! Form::submit('Valider', ['class' => 'btn btn-default get pull-right']) !!}
                        {!! Form::close() !!}
                    {{--</div>--}}
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!--Fin Info Client-->

        <div class="row">
            <div class="step-one">
                <h2 class="heading">Vos commandes </h2>
            </div>
        </div>

    <div class="row"></div>
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
                                    {{--<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
        </div>

    </section>

</div>
@endsection

@section('bottomSlider')
    {{--@include('shop.slider.bottomSlider')--}}
    @endsection
@section('footer')
    @include('shop.nav.footer')
    <script>
        $('#shipAdressBlock').css('display','block');
    </script>
@endsection