<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Produits</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Chaussures
                        </a>
                    </h4>
                </div>
                <div id="sportswear" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="{{route('shopFemme')}}">Femme </a></li>
                            <li><a href="{{route('shopEnfant')}}">Enfant </a></li>
                            <li><a href="{{route('shopHomme')}}">Homme </a></li>
                        </ul>
                    </div>
                </div>
            </div>

            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h4 class="panel-title"><a href="#">Accessoires</a></h4>--}}
                {{--</div>--}}
            {{--</div>--}}

        </div><!--/category-products-->
@php($brandList=\App\Http\Controllers\BrandController::indexBrand())
        <div class="brands_products"><!--brands_products-->
            <h2>Marques</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @foreach($brandList as $brand)
                        {{--." <small class='badge pull-right'>{{$brand['count']}}</small>"--}}
                        {!! Form::open(['method' => 'GET', 'route' => ['brand', $brand->id]]) !!}
                        {!! Form::submit($brand->name , ['class' => 'btn btn-link inline-form nameBrand' ])  !!}
                        {!! Form::close() !!}
                    @endforeach
                </ul>
            </div>
        </div><!--/brands_products-->
    </div>
</div>