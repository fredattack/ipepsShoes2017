<?php
//$=[];
$modeleList=\App\Http\Controllers\reductionController::indexPromo()
?>
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i=0;$i<count($modeleList);$i++)
                            @if($i==0)
                        <li data-target="#slider-carousel" data-slide-to="{{$i}}" class="active"></li>
                            @else
                        <li data-target="#slider-carousel" data-slide-to="{{$i}}"></li>
                        @endif
                                @endfor
                    </ol>

                    <div id="silde1" class="carousel-inner">
                    @for($i=0;$i<count($modeleList);$i++)
                        @if($i==0)
                        <div id="1" class="item active">
                            <div class="col-sm-6">
                                <div class="row">
                                    <h1>{{$modeleList[$i]->name}}</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 pull-right">

                                    <h2>{{number_format ($modeleList[$i]->price-$modeleList[$i]->price*$modeleList[$i]->reduction->value/100,2)}}€</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4 class="reducePrice pull-right" >{{$modeleList[$i]->price}}€</h4>
                                    </div>
                                </div>
                                <div class="row">
                                <button type="button" class="btn btn-default get">Get it now</button>
                                </div>


                            </div>
                            <div class="col-sm-6">  <!--image-->
                                <img src="/image/{{$modeleList[$i]->image}}" class="girl img-responsive" alt="" />
                                <img src="/image/promo/promo{{$modeleList[$i]->idReduction}}.jpg"  class="pricing" alt="" />
                            </div>
                        </div>
                            @else
                                <div id="1" class="item">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <h1>{{$modeleList[$i]->name}}</h1>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pull-right">

                                                <h2>{{number_format ($modeleList[$i]->price-$modeleList[$i]->price*$modeleList[$i]->reduction->value/100,2)}}€</h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="reducePrice pull-right" >{{$modeleList[$i]->price}}€</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <button type="button" class="btn btn-default get">Get it now</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6"> <!--image-->
                                        <img src="/image/{{$modeleList[$i]->image}}" class="girl img-responsive" alt="" />
                                        <img src="/image/promo/promo{{$modeleList[$i]->idReduction}}.jpg"  class="pricing" alt="" />
                                    </div>
                                </div>
                            @endif
                        @endfor


                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->