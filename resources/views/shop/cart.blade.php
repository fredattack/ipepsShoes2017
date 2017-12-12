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
    @if (\Session::has('danger'))
        <div class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('danger') !!}</li>
            </ul>
        </div>
    @endif
    <section id="cart_items" style="min-height: 21em">
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
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{route('cartUpdatePlus',['id'=>$productTemp->id, 'quantity'=> 1])}}"> + </a>
                                <input class="cart_quantity_input" type="text" id="quantity" name="quantity" value="{{$productTemp->quantity}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down " id="cart_quantity_down" href="{{route('cartUpdateMinus',['id'=>$productTemp->id, 'quantity'=>-1])}}"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            @php($sousTotalItem=$prixUnit*$productTemp->quantity)
                            <p class="cart_total_price">{{number_format ($sousTotalItem,2)}} €</p>
                        </td>
                        <td class="cart_delete">
                            {!! Form::open(['method' => 'GET', 'route' => ['cartDestroy', $productTemp->id,]]) !!}
                            {{Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-flat cart_quantity_delete'] )  }}
                            {!! Form::close() !!}
                            {{--<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>--}}
                        </td>
                    </tr>
                        @php($sousTotal+=$sousTotalItem)
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>


    <div class="col-sm-6 pull-right">
        <div class="total_area" >
            <ul>
                @if($user->idFactAdress!=null)
                <li>Sous-Total<span>{{number_format ($sousTotal,2)}} €</span></li>
                <li>Frais de livraison<span>
                        <?php
                        $deliveryCost=$user->adress
                            ->where('id', '=', $user->idShipAdress1)
                            ->first()->deliveryCost
                            ?>
                            {{number_format ($deliveryCost,2)}} €
                    </span></li>
                <li>Total <span> {{number_format ($deliveryCost+$sousTotal,2)}} €</span></li>
                    @else
                    {{--<li>Frais de livraison<span>--}}
                        <?php
//                            $deliveryCost=$user->adress
//                                ->where('id', '=', $user->idShipAdress1)
//                                ->first()->deliveryCost
                            ?>
                            {{--{{number_format ($deliveryCost,2)}} €--}}
                    </span></li>
                    <li>Total <span>
                         {{number_format ($sousTotal,2)}} €
                        </span></li>
                @endif
            </ul>
            <a class="btn btn-default check_out pull-right " style="margin-bottom: 2em" href="{{route('checkOut')}}">Check Out</a>
            <a class="btn btn-default check_out pull-right " style="margin-bottom: 2em" href="{{route('shop')}}">Continuer Vos Achats</a>
        </div>
    </div></section> <!--/#cart_items-->
    @endif
@endsection

@section('bottomSlider')
@endsection
@section('footer')
    @include('shop.nav.footer')
    <script>
        $(document).ready(function(){
            $('#cartLink').addClass('active');

        });

    </script>
@endsection