@extends('layouts.AdminLayout')

@section('title')

@endsection

@section('header')
    @include('admin.nav.header')
@endsection

@section('nav')
@endsection

@section('asideLeft')
    @include('admin.nav.sideBar')
@endsection

@section('asideRight')
    <section class="content-header">
        <h1>
            {{--Dashboard--}}
            {{--<small>Control panel</small>--}}
            Tableau de Bord
            <small>Panneau d'administration</small>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Admin</li>
            <li >Commande</li>
            <li >{{$order->id}}</li>
        </ol>
    </section>
<div class="container">
    <div class="row" style="margin-bottom: 1em;">
        <a href="javascript:history.back()" class="btn btn-primary  btn-lg pull-right">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
    <div class="box box-primary" style="padding: 1em 2em">
        <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
            <div class="col-lg-3 col-xs-12" >
                <p class="box-title">Commande n°:{{$order->id}}</p>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div class="box box-default" style="padding: 1em 2em" >
                        <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                            <p class="box-title">Info Commande</p>
                        </div>
                        <div class="box-body">
                            <div class="container">
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
                                        <b>{{$order->shipment->trackingNr}}</b>
                                @else
                                        <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                @endif

                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="box box-default" style="padding: 1em 2em">

                        <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                                <p class="box-title">Info Client</p>
                        </div>

                        <div class="box-body">
                            <div class="row">
                           <div class="col-xs-12 col-lg-6">
                                <p>N° de client: <b>{{$order->user->id}}</b></p>
                                <p>Nom: <b>{{$order->user->lastName}}</b></p>
                                <p>Prénom: <b>{{$order->user->firstName}}</b></p>
                           </div>

                            <div class="col-xs-12 col-lg-6">

                                <p>Adresse de facturation:<br>

                                    <b>{{$order->user->adress
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
                                    @if($order->user->idShipAdress1==$order->user->idFactAdress) <b>Idem</b>
                                    @else
                                    <b>{{$order->user->adress
                                    ->where('id', '=', $order->user->idShipAdress1)
                                    ->first()->street . "&nbsp;"}}

                                    {{$order->user->adress
                                    ->where('id', '=', $order->user->idShipAdress1)
                                    ->first()->number }}<br>

                                    {{$order->user->adress
                                    ->where('id', '=', $order->user->idShipAdress1)
                                    ->first()->postCode."&nbsp; "}}

                                    {{$order->user->adress
                                    ->where('id', '=', $order->user->idShipAdress1)
                                    ->first()->city }}<br>

                                    {{$order->user->adress
                                    ->where('id', '=', $order->user->idShipAdress1)
                                    ->first()->country}}</b>
                                        @endif
                               </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="box box-default" style="padding: 1em 2em">
                            <div class="box-default" data-toggle="tooltip" title="Header tooltip" >
                                    <p class="box-title">Les Produits</p>
                            </div>
                            <div class="box-body" style="min-height: 15em">
                            {{-- Box Body + table responsive--}}
                                                <div class="box-body table-responsive">
                                                    <table  class="table table-striped table-responsive text-center">
                                                        <thead >
                                                        <tr>
                                                            <th>N°Article</th>
                                                            <th></th>
                                                            <th>Derscription</th>
                                                            <th></th>
                                                            <th>Quantité</th>
                                                            <th>Prix Unitaire</th>
                                                            <th>Sous-total</th>

                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @php($sousTotalProduct=0)
                                                        @foreach($orderLineList as $orderLine)
                                                            <?php
                                                            $price=$orderLine->shoe->modele->price;
                                                            $quantity=$orderLine->quantity;
                                                            $sousTotal=$price * $quantity;
                                                            $sousTotalProduct += $sousTotal;
                                                            $deliveryCost=  $order->user->adress
                                                                            ->where('id', '=', $order->user->idFactAdress)
                                                                            ->first()->deliveryCost;

                                                            ?>
                                                            <tr>
                                                                <td>{{$orderLine->id}}</td>
                                                                <td class="text-center"><img  class="orderImageAdmin" src="/image/{{$orderLine->shoe->modele->image}}"></td>
                                                                <td>
                                                                    {{$orderLine->shoe->modele->name ."&nbsp;"}}
                                                                    {{$orderLine->shoe->modele->gender->name ."&nbsp;"}}
                                                                    {{$orderLine->shoe->modele->color ."&nbsp;"}}
                                                                    {{$orderLine->shoe->size}}
                                                                </td>
                                                                <td class="text-center"><img  class="orderLogoImageAdmin" src="/image/{{$orderLine->shoe->modele->brand->logo}}"></td>
                                                                <td>{{$quantity}}</td>
                                                                <td>{{$price}}</td>
                                                                <td>{{number_format ($sousTotal,2)}} </td>
                                                            </tr>
                                                        @endforeach

                                                        <tr>
                                                            <td class="tg-yw4l" colspan="5" rowspan="3"></td>
                                                            <td class="tg-yw4l"><b>Sous-Total</b></td>
                                                            <td class="tg-yw4l">{{number_format ($sousTotalProduct,2)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="tg-yw4l"><b>Livraison</b></td>
                                                            <td class="tg-yw4l">{{$deliveryCost}}</td>
                                                        </tr>
                                                        <tr style="font-size: x-large">
                                                            @php($total= $sousTotalProduct+$deliveryCost)
                                                            <td class="tg-yw4l"><b>Total</b></td>
                                                            <td class="tg-yw4l">{{number_format ($total,2)}}</td>
                                                        </tr>
                                                        </tbody>
                                                        <tfoot>
                                                    </table>
                                                </div>{{-- Box Body + table responsive--}}

                            </div>
                            {{--<div class="box-footer">--}}
                                {{--<h1 class="box-title">Footer</h1>--}}
                            {{--</div>--}}
                        </div>
            </div>

        </div>

        {{--<div class="box-footer">--}}
          {{--<h1 class="box-title">Footer</h1>--}}
        {{--</div>--}}

    </div>
</div>
@endsection
@section('section')


@endsection

@section('footer')
@endsection