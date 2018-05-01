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
            <li>Admin</li>
            <li class="active">User</li>

        </ol>
    </section>

    <div class="container">

        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 pull right">
                <a class="btn btn-success btn-lg pull-right" href="{{route('downloadExcel','user')}}" style="margin-right: 2em;margin-top: 1em"><i class="fa fa-plus-square"></i> Exporter en csv</a>
            </div>

        </div>
        <div class="box box-primary" style="padding: 1em 2em">

            <div class="box-header" data-toggle="tooltip" title="Header tooltip" >
                <div class="col-lg-3 col-xs-12" >
                    <p class="box-title">User</p>
                </div>
            </div>

            <div class="box-body" >


                    {{--<h1 class="box-title" >body</h1>--}}
                <table id="myTable" class="table table-striped table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th></th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        {{--<th>Login</th>--}}
                        <th>email</th>
                        <th style="min-width: 5em">Role</th>
                        <th>Adr. Facturation</th>
                        <th>Adr. Livraison</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($userList as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                {!! Form::open(['method' => 'GET', 'route' => ['user.show', $user->id,]]) !!}
                                @if($user->role=='admin')
                                    <div class="form-group ">
                                        {{Form::button('<i class="fa fa-eye"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                                    </div>
                                @elseif($user->role=='client')
                                    <div class="form-group ">
                                        {{Form::button('<i class="fa fa-eye"></i>', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] )  }}
                                    </div>
                                @elseif($user->role=='seller')
                                    <div class="form-group ">
                                        {{Form::button('<i class="fa fa-eye"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  }}
                                    </div>
                                @endif
                                {!! Form::close() !!}
                            </td>
                            <td>{{$user->firstName}}</td>
                            <td>{{$user->lastName}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                         <?php
                                $lesRoles= ['0'=>'Admin','1'=>'Client','2'=>'Vendeur'];
                                if($user->role=='admin') $role=0;
                                elseif($user->role=='client')$role=1;
                                elseif($user->role=='seller') $role=2;
                                ?>

                                {!! Form::open(['method' => 'put', 'route' => ['user.update', $user->id]]) !!}
                                <div class="form-group ">
                                    {{ Form::select('role',$lesRoles ,$role,['class'=>'form-control selectRole','onchange'=>'upDateRole(this,'.$user->id.')']) }}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            <td >
                                @if($user->idFactAdress!=null)
                                    <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>
                                @else <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                @endif
                            </td>
                            <td >
                                @if($user->idShipAdress1!=null)

                                    <span class="glyphicon glyphicon-check" style="color: limegreen;"></span>
                                @else <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                @endif
                            </td>


                        </tr>
                    @endforeach


                    </tbody>


                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th></th>

                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>email</th>
                        <th>Role</th>
                        <th>Adr. Facturation</th>
                        <th>Adr. Livraison</th>
                    </tr>
                    </tfoot>
                </table>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $("#myTable").dataTable();
        });
    </script>
@endsection

@section('footer')


@endsection
<!-- page script -->
