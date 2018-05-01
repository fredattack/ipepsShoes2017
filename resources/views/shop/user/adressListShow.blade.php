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
        @if(Session::has('Url') )
            {{--<script>alert('checkout')</script>--}}
        <a href="{{route('checkOut')}}" class="btn btn-primary  btn-lg pull-right">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
            @else
        <a href="javascript:history.back()" class="btn btn-primary  btn-lg pull-right">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
        @endif
    </div>
    <div class="row">
        <div class="step-one">
            <h2 class="heading">Vos adresses</h2>
        </div>
    </div>

<div class="container" style="min-height: 24em;margin-top:4em;">
    @foreach($adressList as $adress)
    <div class="col-lg-4 col-sm-12 " >
      <div class="box" >
          @if($user->idFactAdress==$adress->id)
          <h4>{{$adress->name}}<small> (Adresse de facturation)</small></h4>
          @elseif($user->idShipAdress1==$adress->id)
              <h4>{{$adress->name}}<small> (Adresse de livraison)</small></h4>
          @elseif($user->idShipAdress1==$adress->id and $user->idFactAdress==$adress->id)
              <h4>{{$adress->name}}<small> (Adresse de livraison et de Facturation)</small></h4>
          @else
              <h4>{{$adress->name}}</h4>
          @endif

            <p>{{$adress->street}} {{$adress->number}}</p>
            <p>{{$adress->postCode}} {{$adress->city}}</p>
            <p>{{$adress->country}}</p>
         @if($user->idShipAdress1==$adress->id)
              <div class="boxLinks">
                  <b></b>
                  <a data-toggle="modal" data-target="#editAdress" onclick="PassVal({{$adress}})">Modifier   -</a>
                  {!! Form::open(['method' => 'DELETE', 'route' => ['adress.destroy', $adress->id]]) !!}
                  {!! Form::submit('Supprimer', ['class' => 'btn btn-link', 'onclick' => 'return confirm(\'Voulez vous vraiment supprimer cette adresse ?\')'])  !!}
                  {!! Form::close() !!}
              </div>
         @else
              <div class="boxLinks">
                  <a href="{{route('userDefaultAdress',$adress->id)}}">Choisir pour la livraison   - </a>
                  <a data-toggle="modal" data-target="#editAdress" onclick="PassVal({{$adress}})">Modifier -</a>
                  {!! Form::open(['method' => 'DELETE', 'route' => ['adress.destroy', $adress->id]]) !!}
                  {!! Form::submit('Supprimer', ['class' => 'btn btn-link', 'onclick' => 'return confirm(\'Voulez vous vraiment supprimer cette adresse ?\')'])  !!}
                  {!! Form::close() !!}
              </div>
          @endif

      </div>
    </div>
    @endforeach
         <a onclick="" class="btn btn-primary  btn-lg pull-right" data-toggle="modal" data-target="#createAdress">
            <span class="glyphicon glyphicon glyphicon-plus"></span> ajouter une adresse
         </a>
    {{--</div>--}}

</div>
@endsection

@section('bottomSlider')
    @include('shop.modal.createAdress')
    @include('shop.modal.editAdress')

@endsection
@section('footer')
    @include('shop.nav.footer')
    <script>
        function PassVal(res)
    {
    $('#modalForm').attr('action', 'http://ipepsshoes2017.dev/adress/' +res['id']);
    $('#name').val(res['name']);
    $('#street').val(res['street']);
    $('#number').val(res['number']);
    $('#postCode').val(res['postCode']);
    $('#city').val(res['city']);
    $('#country').val(res['country']);

//        $('#jourNom').append(res['day']);
    }
    </script>
@endsection