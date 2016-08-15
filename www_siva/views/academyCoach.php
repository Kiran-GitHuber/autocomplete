<?php header('Access-Control-Allow-Origin: *'); ?>

<div class="container">
    <div class="row">
        <button ng-click="returnHome()" type="button" class="btn btn-info" style="margin:15px 0px"><i
                class="fa fa-chevron-left"> BACK</i></button>

        <div class="row restaurantBanner">
            <div class="col-md-3"><img ng-src='img/coachPhotos/{{acadCoaches.coachPhoto}}.png' width="100"></div>
            <div class="col-md-3"><b>{{acadCoaches.acadCoachName}}</b><br>{{acadCoaches.acadCoachAddress}}<br>

                <div ng-class="ratings(acadCoaches.acadCoachRating)" class="badgeRating bg-badge"
                     style="display:inline-block">
                    {{acadCoaches.acadCoachRating | number:1}}
                </div>
                <span class="padLeft10">{{acadCoaches.reviewCount}} Reviews</span><br>

                <div ng-click="" tooltip="Please click to Rate and Review this Academy or Coach"
                     tooltip-placement="bottom" style="cursor: pointer"><span
                        class="glyphicon glyphicon-edit"> </span><b> Rate and Write a
                        review</b></div>
            </div>
            <div class="col-md-3 text-left">Timings: {{acadCoaches.timing}}<br><br>
                <span class="phoneFont">{{acadCoaches.mobileNumber1}}<br>{{acadCoaches.mobileNumber2}}</span>
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center cartBox" style="cursor:default">
                <div class="discountBorder">
                    <div class="fontLobster paymentModeHeader">
                        Details related to office</div>
                    <div class="paymentModeBody">
                        <table class="table table-responsive text-left">
                            <tr class="itemPrice">
                                <td>TIMINGS:</td>
                            </tr>
                            <tr class="itemPrice">
                                <td>FEES:</td>
                            </tr>
                            <tr class="itemPrice">
                                <td>NO.OF COACHES:</td>
                            </tr>
                            <tr class="itemPrice">
                                <td>ACCREDITIONS/RATED BY</td>
                            </tr>
                            <tr class="itemPrice">
                                <td>NEWSPAPERS</td>
                            </tr>
                            <tr class="itemPrice">
                                <td>CONTACT DETAILS</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 lrBorder">
                <div >
                    <h3 class="text-center fontLobster">Events</h3>

                    <div class="text-justify" style="color:#ffffff">

                        <div class="">
                            <!--<carousel interval="myInterval">-->
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
                <div class="cartBox">
                    <h3 class="text-center fontLobster">Reviews</h3>

                    <div ng-if="acadCoachReviews.review === 'a'" class="fpMedia">
                        <div class="media"
                             ng-repeat="review in acadCoachReviews.reviews">
                            <div class="media-left media-middle">
                                <a href="javascript:void(0)">
                                    <img class="media-object"
                                         src="img/coachPhotos/{{review.picture}}.png" alt="pic" width="60"
                                         height="60">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <span class="badgeRating sm-badge" ng-class="ratings(review.rating)">
                                    {{review.rating | number:1}}</span> by <span
                                        class="text-capitalize">{{review.name}}</span></rating></span>
                                </div>

                                <p class="text-muted text-justify">{{review.message}}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3 fontLobster">
                <span>Upcoming tournaments-sponsored Ads</span>
            </div>
        </div>
    </div>
</div>