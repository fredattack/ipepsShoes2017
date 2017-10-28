<div class="col-sm-9">
    @if (\Session::has('danger'))
        <div class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('danger') !!}</li>
            </ul>
        </div>
    @endif
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <?php
                    $nom=$leModele->image;
                    $src=asset("/image/$nom");
                    ?>
                    <img src={{$src}} alt="" />
                    <h3>ZOOM</h3>
                </div>
            </div>

            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <div class="row">
                        <h1>{{$leModele->name}}</h1>
                    </div>
                    <div class="row ">
                        @if($leModele->idReduction!=1)
                            <h3 class="pull-right reducePrice" >{{$leModele->price}}€</h3>
                        @endif
                            <span class="pull-right"><span>{{number_format ($leModele->price-$leModele->price*$leModele->reduction->value/100,2)}}€</span></span>

                        </div>
                    {{Form::open(array('route' => 'cartStoreInSession'),['class'=>'form-inline'])}}
                    <input type="hidden" name="idModele" value="{{$leModele->id}}">
                    <div class="row" style="margin-top: 1em">
                    <div class="col-sm-6 ">
                        <label>Quantité:</label>
                        <td class="cart_quantity pull-right" >
                            <div class="cart_quantity_button">
                                <input class="cart_quantity_input form-control" type="number" name="quantity" id="quantity"  value="1" min="1" autocomplete="off" size="1" style="width: 5em">
                            </div>
                        </td>
                </div>

                    <div class="col-sm-6">
                        <label >Taille:</label>
                            <select class="form-control selectSize " name="size" style="width:5em">
                                @foreach($shoesList as $shoe)
                                    @if($shoe->quantity!=0)
                                    <option value="{{$shoe->size}}">{{$shoe->size}}</option>
                                    @else
                                    <option value="{{$shoe->size}}" disabled>{{$shoe->size}}</option>
                                    @endif
                                @endforeach
                            </select>
                    </div>
            </div>
                    <div class="row" style="margin-top: 1em">
                        <p><b>Type:</b> {{$leModele->type->name}}</p>
                        <p><b>Genre:</b>{{$leModele->Gender->name}}</p>
                        <p><b>Marque:</b> {{$leModele->brand->name}}</p>
                    </div>

                    <div class="row">
                        <?php
                        $nom=$leModele->brand->logo;
                        $src=asset("/image/$nom");
//                        $idModel=$leModele->id;
//                        $size= $request->get('size');
//                        $quantity=1;


                        ?>
                        <div class="col-sm-6" style="top: 7em;">
                            @if (Auth::check())
                            {!! Form::submit('Ajouter au panier', ['class' => 'btn btn-default cart' ])  !!}
                            @else
                                <a href="{{route('login')}}" class="btn btn-default cart">Se Connecter</a>

                            @endif
                            {!! Form::close() !!}
                        </div>
                        <div class="col-sm-6">

                            <div class="brandLogo pull-Right">
                                <img src={{$src}} alt="" />
                            </div>
                        </div>
                    </div>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

    <div class="row">
        <h2 class="title text-center">Dans la même catégorie</h2>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                @for($i=0;$i<3;$i++)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/image/{{$similarList[$i]->image}}" alt="" />

                                        <h4 class="reducePrice " >{{$similarList[$i]->price}}€</h4>
                                        <h2>{{number_format ($similarList[$i]->price-$similarList[$i]->price*$similarList[$i]->reduction->value/100,2)}}€</h2>
                                        {!! Form::open(['method' => 'GET', 'route' => ['show', $similarList[$i]->id,]]) !!}
                                        {{Form::button('<i class="fa fa-eye">Détails</i>', ['type' => 'submit', 'class' => 'btn btn-default add-to-cart'] )  }}
                                        {!! Form::close() !!}
                                        {{--<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Panier</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                @php($similarList ->shuffle())
                <div class="item">
                    @for($i=0;$i<3;$i++)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/image/{{$similarList[$i]->image}}" alt="" />

                                        <h4 class="reducePrice " >{{$similarList[$i]->price}}€</h4>
                                        <h2>{{number_format ($similarList[$i]->price-$similarList[$i]->price*$similarList[$i]->reduction->value/100,2)}}€</h2>
                                        {!! Form::open(['method' => 'GET', 'route' => ['show', $similarList[$i]->id,]]) !!}
                                        {{Form::button('<i class="fa fa-eye">Détails</i>', ['type' => 'submit', 'class' => 'btn btn-default add-to-cart'] )  }}
                                        {!! Form::close() !!}
                                        {{--<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Panier</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <!-- Controls -->
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>

    </div>
</div>
<script>
//    if($('#quantity').val()==1)
//    {
//        alert('quantityMinus');
//    }
    function updateQuantity(val) {
    quantity=  parseInt($('#quantity').val()) + val;
     $('#quantity').val(quantity);

    }
</script>