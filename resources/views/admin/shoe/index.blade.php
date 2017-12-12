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

            Les Chaussures
            {{--<small>Liste des produits</small>--}}

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Admin</li>
            <li >Modele</li>
            <li class="active">Stock</li>
        </ol>
    </section>

    <div class="container">



            <div class="box box-primary">
                <div class="box-header">
                    <div class="col-lg-6">
                        <h3 class="box-title">Liste des Chaussures</h3>
                    </div>

                    <div class="col-lg-6 text-right">
                        <a href="{{route("downloadExcel","shoe")}}"><button class="btn btn-success">Exporter en  CSV</button></a>

                    </div>


                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Modéle</th>
                            <th>Couleur</th>
                            <th>Taille</th>
                            <th>Quantité</th>
                            <th>Genre</th>
                            <th>Type</th>
                            <th>Marque</th>
                            <th>Promo</th>
                            <th>prix</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($shoesList as $shoe)
                        <tr>
                            <td>{{$shoe->modele->name}}</td>
                            <td>{{$shoe->modele->color}}</td>
                            <td>{{$shoe->size}}</td>
                            <td>{{$shoe->quantity}}</td>
                            <td>{{$shoe->modele->gender->name}}</td>
                            <td>{{$shoe->modele->type->name}}</td>
                            <td>{{$shoe->modele->brand->name}}</td>
                            <td>{{$shoe->modele->reduction->value}}%</td>
                            <td>{{$shoe->modele->price}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Modéle</th>
                            <th>Couleur</th>
                            <th>Taille</th>
                            <th>Quantité</th>
                            <th>Genre</th>
                            <th>Type</th>
                            <th>Marque</th>
                            <th>Promo</th>
                            <th>prix</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->


    </div>


@endsection


@section('footer')
@endsection