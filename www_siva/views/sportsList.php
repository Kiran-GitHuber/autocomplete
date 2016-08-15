<?php header('Access-Control-Allow-Origin: *'); ?>
<!--<div id="loaderDiv" loader>
    <img src="img/ajax_loader.gif" class="ajax-loader"/>
</div>-->

<div class="cartBox">
    <h3 class="text-center fontLobster">Events</h3>

    <div class="text-justify" style="color:#ffffff">

        <div class="">
            <carousel interval="myInterval">
                <slide ng-repeat="slide in slides" active="slide.active">
                    <img ng-src="{{slide.image}}" style="margin:auto;">

                    <div class="carousel-caption">
                        <h4>Slide {{$index+1}}</h4>

                        <p>{{slide.text}}</p>
                    </div>
                </slide>
            </carousel>
        </div>
    </div>
</div>