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
        </ol>
    </section>

    <div class="container">
        <div class="box box-primary" style="padding: 1em 2em">

                    <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                        <div class="col-lg-3 col-xs-12" >
                            <p class="box-title">Header</p>
                        </div>
                    </div>

                    <div class="box-body">
                    {{-- Box Body + table responsive--}}
                                        <div class="box-body table-responsive">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Login</th>
                                                    <th>email</th>
                                                    <th>Total Achats</th>
                                                    <th>Adr. Facturation</th>
                                                    <th>Adr. Livraison 1</th>
                                                    <th>Adr. Livraison 2 </th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($userList as $user)
                                                    <tr>
                                                        <td>{{$user->id}}</td>
                                                        <td>{{$user->firstName}}</td>
                                                        <td>{{$user->lastName}}</td>
                                                        <td>{{$user->login}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{rand(15,30)}}</td>
                                                        <td style="white-space: nowrap;">
                                                            @if($user->idFactAdress!=null)
                                                                {{--{{$user->adress->where('id', '=', $user->idFactAdress)->first()->street . "&nbsp;".--}}
                                                                {{--$user->adress->where('id', '=', $user->idFactAdress)->first()->number }}<br>--}}
                                                                {{--{{$user->adress->where('id', '=', $user->idFactAdress)->first()->postCode."&nbsp; ".--}}
                                                                {{--$user->adress->where('id', '=', $user->idFactAdress)->first()->city }}<br>--}}
                                                                {{--{{$user->adress->where('id', '=', $user->idFactAdress)->first()->country}}--}}
                                                                <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>

                                                        @else <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                            @endif
                                                        </td>
                                                        <td style="white-space: nowrap;">
                                                            @if($user->idShipAdress1!=null)
                                                                {{--{{$user->adress->where('id', '=', $user->idShipAdress1)->first()->street . "&nbsp;".--}}
                                                                {{--$user->adress->where('id', '=', $user->idShipAdress1)->first()->number }}<br>--}}
                                                                {{--{{$user->adress->where('id', '=', $user->idShipAdress1)->first()->postCode."&nbsp; ".--}}
                                                                {{--$user->adress->where('id', '=', $user->idShipAdress1)->first()->city }}<br>--}}
                                                                {{--{{$user->adress->where('id', '=', $user->idShipAdress1)->first()->country}}--}}
                                                                <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>
                                                            @else <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                        @endif
                                                        <td style="white-space: nowrap;">
                                                            @if($user->idShipAdress2!=null)
                                                                {{--{{$user->adress->where('id', '=', $user->idShipAdress2)->first()->street . "&nbsp;".--}}
                                                                {{--$user->adress->where('id', '=', $user->idShipAdress2)->first()->number }}<br>--}}
                                                                {{--{{$user->adress->where('id', '=', $user->idShipAdress2)->first()->postCode."&nbsp; ".--}}
                                                                {{--$user->adress->where('id', '=', $user->idShipAdress2)->first()->city }}<br>--}}
                                                                {{--{{$user->adress->where('id', '=', $user->idShipAdress2)->first()->country}}--}}
                                                                <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>

                                                            @else<span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                                        @endIf
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Login</th>
                                                    <th>email</th>
                                                    <th>Total Achats</th>
                                                    <th>Adr. Facturatio</th>
                                                    <th>Adr. Livraison 1</th>
                                                    <th>Adr. Livraison 2 </th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>{{-- Box Body + table responsive--}}

                    </div>
                    <div class="box-footer">
                        <h1 class="box-title">Footer</h1>

                    </div>
                </div>

    </div>

@endsection
@section('section')


@endsection

@section('footer')
@endsection