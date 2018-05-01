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
    <div class="container">
        <section id="cart_items">
            <div class="container">
                <div class="col-lg-4">
                    <h1>info</h1>
                    <p>N° de client: <b>{{$user->id}}</b></p>
                    <p>Nom: <b>{{$user->lastName}}</b></p>
                    <p>Prénom: <b>{{$user->firstName}}</b></p>
                    <P>Email: <b>{{$user->email}}</b></P>
                </div>
                <div class="col-lg-4">
                    <h1>facturation</h1>
                    {{$user->adress
                    ->where('id', '=', $user->idFactAdress)
                    ->first()->name  }}
                        <br/>
                        {{$user->adress
                    ->where('id', '=', $user->idFactAdress)
                    ->first()->street . "&nbsp;"}}

                        {{$user->adress
                    ->where('id', '=', $user->idFactAdress)
                    ->first()->number }}<br>

                        {{$user->adress
                        ->where('id', '=', $user->idFactAdress)
                        ->first()->postCode."&nbsp; "}}

                        {{$user->adress
                        ->where('id', '=', $user->idFactAdress)
                        ->first()->city }}<br>

                        {{$user->adress
                        ->where('id', '=', $user->idFactAdress)
                        ->first()->country}}</b>
                </div>
                <div class="col-lg-4">
                    <h1>Livraison</h1>
                    {{$user->adress
                    ->where('id', '=', $user->idShipAdress1)
                    ->first()->name  }}
                    <br/>
                    {{$user->adress
                ->where('id', '=', $user->idShipAdress1)
                ->first()->street . "&nbsp;"}}

                    {{$user->adress
                ->where('id', '=', $user->idShipAdress1)
                ->first()->number }}<br>

                    {{$user->adress
                    ->where('id', '=', $user->idShipAdress1)
                    ->first()->postCode."&nbsp; "}}

                    {{$user->adress
                    ->where('id', '=', $user->idShipAdress1)
                    ->first()->city }}<br>

                    {{$user->adress
                    ->where('id', '=', $user->idShipAdress1)
                    ->first()->country}}</b>
                </div>


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


                                    <button type="submit" class="btn btn-primary  check_out pull-right">
                                        Confirmer le payement
                                    </button>

                        </form>
    </div>



@endsection

@section('bottomSlider')
{{--    @include('shop.slider.bottomSlider')--}}
    @endsection
@section('footer')
    @include('shop.nav.footer')
@endsection