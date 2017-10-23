<?php
$modeleList=\App\Http\Controllers\ReductionController::indexPromo()
?>
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Super Deals</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @for($i=0;$i<3;$i++)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="/image/{{$modeleList[$i]->image}}" alt="" />

                                <h4 class="reducePrice " >{{$modeleList[$i]->price}}€</h4>
                                <h2>{{number_format ($modeleList[$i]->price-$modeleList[$i]->price*$modeleList[$i]->reduction->value/100,2)}}€</h2>

                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Panier</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <?php
            $modeleList2=\App\Http\Controllers\reductionController::indexPromo()
            ?>
            <div class="item">
                @for($i=0;$i<3;$i++)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/image/{{$modeleList[$i]->image}}" alt="" />

                                    <h4 class="reducePrice " >{{$modeleList[$i]->price}}€</h4>
                                    <h2>{{number_format ($modeleList[$i]->price-$modeleList[$i]->price*$modeleList[$i]->reduction->value/100,2)}}€</h2>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Panier</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor


            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div><!--/recommended_items-->