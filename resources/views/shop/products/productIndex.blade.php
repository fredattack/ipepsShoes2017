<script>
    $(document).ready(function(){
        $('#shopLink').addClass('active');
    });
</script>

<div class="col-sm-9 ">
    <div class="features_items"><!--features_items-->
       @foreach($genderList as $gender)
           <div class="row">
            <h2 class="title text-center">{{$gender->name}}</h2>
                @foreach($modeleList as $modele)
                    @if($modele->idGender == $gender->id)
                    <div class="col-sm-4 pull-left">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?php
                                    $nom=$modele->image;
                                    $src=asset("/image/$nom");
                                    ?>
                                    <img src={{$src}} alt="" />
                                        <div class="row" style="min-height: 7em">
                                            @if($modele->idReduction==1)
                                            <h2 >{{$modele->price}}</h2>
                                            @else
                                            <h4 class="reducePrice " >{{$modele->price}}€</h4>
                                            <h2>{{number_format ($modele->price-$modele->price*$modele->reduction->value/100,2)}}€</h2>
                                            @endif
                                        </div>
                                        <p>{{$modele->name}}</p>
                                        {!! Form::open(['method' => 'GET', 'route' => ['show', $modele->id,]]) !!}
                                        {{Form::button('<i class="fa fa-eye">Détails</i>', ['type' => 'submit', 'class' => 'btn btn-default add-to-cart'] )  }}
                                        {!! Form::close() !!}
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        @if($modele->idReduction==1)
                                        <div class="row " style="min-height: 7em">
                                        @else
                                            <div class="row" style="min-height: 5em">
                                            @endif
                                             </div>
                                            <p>{{$modele->name}}</p>

                                            {!! Form::open(['method' => 'GET', 'route' => ['show', $modele->id,]]) !!}
                                            {{Form::button('<i class="fa fa-eye">Détails</i>', ['type' => 'submit', 'class' => 'btn btn-default add-to-cart'] )  }}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                    </div>
        @endforeach
            </div>
    </div>
</div>
