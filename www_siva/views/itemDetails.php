<?php header('Access-Control-Allow-Origin: *'); ?>
<div id="loaderDiv" loader>
    <img src="img/ajax_loader.gif" class="ajax-loader"/>
</div>
<ui-breadcrumb></ui-breadcrumb>
<div class="container">
    <div class="row">

        <div class="row heroBanner">
            <div class="col-md-3"><img ng-src='img/restaurantsLogos/{{restaurantMenus.restaurantLogo}}.png'></div>
            <div class="col-md-3"><b>{{restaurantMenus.restaurantName}}</b><br>{{restaurantMenus.restaurantAddress}}<br>

                <div ng-class="ratings(restaurantMenus.restaurantRating)" class="badgeRating bg-badge"
                     style="display:inline-block">
                    {{restaurantMenus.restaurantRating | number:1}}
                </div>
                <span class="padLeft10"
                      ng-if="restaurantMenus.reviewCount == 1">{{restaurantMenus.reviewCount}} Review</span>
                <span class="padLeft10"
                      ng-if="restaurantMenus.reviewCount != 1">{{restaurantMenus.reviewCount}} Reviews</span><br>

                <div ng-click="writeReview()" tooltip="Please click to Rate and Review this restaurant"
                     tooltip-placement="bottom" style="cursor: pointer"><span
                        class="glyphicon glyphicon-edit"> </span><b> Rate and Write a
                        review</b></div>
            </div>
            <div class="col-md-3 text-left">
                Operating Time:<br>{{restaurantMenus.lunchTime}}<br>
                {{restaurantMenus.dinnerTime}}
                <div><span class="glyphicon glyphicon-time"></span> Delivery in {{restaurantMenus.deliveryTimeRange}}min
                </div>
            </div>
            <div class="col-md-3">
                <span>Free Delivery on Min Order: <i class="fa fa-inr"></i>{{restaurantMenus.minimumOrder}}</span><br>
                <a href="tel:{{restaurantMenus.mobileNumber}}" class="phoneFont" style="color:#fff"><i
                        class="glyphicon glyphicon-hand-right"></i>&nbsp;{{restaurantMenus.mobileNumber}}</a><br>
                <a href="tel:{{restaurantMenus.mobileNumber2}}" class="phoneFont" style="color:#fff"><i
                        class="glyphicon glyphicon-hand-right"></i>&nbsp;{{restaurantMenus.mobileNumber2}}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center cartBox" style="cursor:default">
                <div ng-if="" class="discountBorder">
                    <div class="fontLobster paymentModeHeader">Restaurant Highlights</div>
                    <div class="paymentModeBody">
                        <marquee class="itemPrice fontLobster" style="font-size: 16px"><b>&#42;&#42; To avail Cashback
                                please ask for Foodpatra
                                Coupon while placing the order.</b></marquee>
                        <table class="table table-responsive text-left">
                            <tr>
                                <th class="fontLobster phoneFont">On every order get Patra coupon worth <span
                                        class="itemPrice">{{restaurantMenus.discount}}</span> and above on your total
                                    order amount.
                                </th>
                            </tr>
                            <tr ng-if="restaurantMenus.highlights" class="itemPrice">
                                <td>&#42; {{restaurantMenus.highlights}}</td>
                            </tr>
                            <!--<tr ng-repeat="restDiscount in restaurantDiscounts" class="itemPrice">
                                <td><i class="fa fa-inr"></i>{{restDiscount.amountStart}} &#45; <i class="fa fa-inr"></i>{{restDiscount.amountEnd}}</td>
                                <td><i class="fa fa-inr"></i>{{restDiscount.discountStart}} &#45; <i class="fa fa-inr"></i>{{restDiscount.discountEnd}}</td>
                            </tr>-->
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 lrBorder">
                <div ng-if="!imgFlag">
                    <h3 class="text-center fontLobster">Menu</h3>

                    <div ng-if="restaurantMenus.restaurantMenu.length" class="thumbImgPosition">
                        <a href="javascript:void(0)" ng-click="selectMenu()"
                           ng-repeat="restMenu in restaurantMenus.restaurantMenu"><img
                                src="menu/{{restMenu.imageThumb}}"
                                class="img-rounded thumbImg"
                                alt="thumbnail" width="124"
                                height="124"></a>
                        <a ng-if="restaurantMenus.menuCount>0" href="javascript:void(0)" ng-click="selectMenu()">
                            <div class="menuThumbImg" tooltip="Click to see Menu Cards"
                                 tooltip-placement="bottom">
                                &#43;{{restaurantMenus.menuCount}}
                            </div>
                        </a>
                    </div>
                    <p class="alertNote mgnTopBtm20 text-justify">&#42; The prices indicated are subjected to changes.
                        Foodpatra
                        tries to ensure that
                        the prices indicated on the site are up-to-date and accurate. However, we accept no liability
                        for
                        any errors and omissions in the menu.Delivery/Packing charges extra, if any. Delivery time is
                        tentative.</p>
                </div>
                <div ng-if="imgFlag">
                    <h3 class="text-center fontLobster">Menu Card</h3>

                    <div class="text-justify" style="color:#ffffff">

                        <div class="">
                            <!--<carousel interval="myInterval">-->
                            <carousel>
                                <slide ng-repeat="menuCard in menuCards" active="menuCard.active">
                                    <img ng-src="menu/{{menuCard.menuPath}}" style="margin:auto;">

                                    <div class="carousel-caption">
                                        <h4 style="color:#000000;font-weight: bold">Menu {{$index +
                                            1}}/{{menuCards.length}}</h4>
                                        <!--<p>{{slide.text}}</p>-->
                                    </div>
                                </slide>
                            </carousel>
                        </div>
                    </div>
                </div>
                <div class="cartBox">
                    <h3 class="text-center fontLobster">Reviews</h3>

                    <div ng-if="itemDetails.itemReviews" class="fpMedia">
                        <div class="media"
                             ng-repeat="review in itemDetails.itemReviews">
                            <div class="media-left media-middle">
                                <a href="javascript:void(0)">
                                    <img class="media-object"
                                         src="{{review.picture}}" alt="pic" width="60"
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
                    <div ng-click="writeReview()" ng-if="restaurantReviews.review === 'na'"
                         class="fontLobster text-center mgnTopBtm20 text-danger"
                         style="cursor: pointer"><h4><span
                                class="glyphicon glyphicon-edit"> </span>No Reviews. Be the
                            first to review this academy</h4></div>

                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
</div>