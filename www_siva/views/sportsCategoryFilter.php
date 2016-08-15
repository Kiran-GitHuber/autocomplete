<?php header('Access-Control-Allow-Origin: *'); ?>
<!--<div id="loaderDiv" loader>
    <img src="img/ajax_loader.gif" class="ajax-loader"/>
</div>-->
<ui-breadcrumb></ui-breadcrumb>
<div class="cartBox row">
    <div class="col-md-3">
        <div class=""><h4>Filter By</h4>
            <hr>
            <div><label>Categories:</label>
                <span class="pull-right">Select All</span> <span class="pull-right">Reset</span>
            </div>
            <ul class="filterItem" style="height:auto">
                <li ng-if="categories.length>0" ng-repeat="category in categories" class="radio"><label><input
                            type="radio" value="{{$index}}"
                            onclick="">{{category.type}}</label>
                </li>
            </ul>
            <hr>
            <div><label>Sports:</label>
                <span class="pull-right">Reset</span>
            </div>
            <ul class="filterItem">
                <li ng-if="sportsList.length>0" ng-repeat="sport in sportsList" class="checkbox"><label><input
                            type="checkbox" value="{{$index}}" onclick="">{{sport.type}}</label>
                </li>
            </ul>
            <hr>
            <div><label>Gender:</label>
                <span class="pull-right">Reset</span>
            </div>
            <ul class="filterItem" style="height: auto">
                <li ng-if="filterBy.genders" ng-repeat="gender in filterBy.genders" class="radio"><label><input
                            type="radio" value="{{$index}}"
                            onclick="">{{gender.type}}</label>
                </li>
            </ul>
            <hr>
            <label>Facilities:</label>
            <span class="pull-right">Reset</span>
            <ul class="filterItem">
                <li ng-if="filterBy.facilities" ng-repeat="facility in filterBy.facilities" class="checkbox">
                    <label><input
                            type="checkbox" value="{{$index}}" onclick="">{{facility.type}}</label>
                </li>
            </ul>
            <hr>
            <label>Area:</label>
            <span class="pull-right">Reset</span>
            <ul class="filterItem">
                <li ng-if="filterBy.areas" ng-repeat="area in filterBy.areas" class="checkbox"><label><input
                            type="checkbox" value="{{$index}}" onclick="">{{area.name}}</label>
                </li>
            </ul>
        </div>
    </div>
    <!--<div class="col-md-3">
        <ul class="nav nav-divider" id="accordion1">
            <li class="panel" style="margin-bottom: 0px;"><a data-toggle="collapse" data-parent="#accordion1" data-target="#firstLink">Gender:</a>
                <span class="pull-right">Reset</span>
                <ul id="firstLink" class="collapse">
                    <li ng-if="filterBy.genders" ng-repeat="gender in filterBy.genders">
                        <div class="radio"><label><input
                                    type="radio" value="{{$index}}"
                                    onclick="">{{gender.type}}</label>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="panel" style="margin-bottom: 0px;"><a data-toggle="collapse" data-parent="#accordion1" data-target="#secondLink">Facilities:</a>
                <span class="pull-right">Reset</span>
                <ul id="secondLink" class="collapse">
                    <li ng-if="filterBy.facilities" ng-repeat="facility in filterBy.facilities">
                        <div class="checkbox"><label><input
                                    type="checkbox" value="{{$index}}" onclick="">{{facility.type}}</label>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="panel" style="margin-bottom: 0px;"><a data-toggle="collapse" data-parent="#accordion1" data-target="#thirdlink">Area:</a>
                <span class="pull-right">Reset</span>
                <ul id="thirdlink" class="collapse">
                    <li ng-if="filterBy.areas" ng-repeat="area in filterBy.areas">
                        <div class="checkbox"><label><input
                                    type="checkbox" value="{{$index}}" onclick="">{{area.name}}</label>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>-->
    <div class="col-md-6 lrBorder">
        <div class=""><a href="javascript:void(0)" class="btn btn-instagram">A-Z</a><span
                class="glyphicon glyphicon-sort-by-alphabet"></span> <a href="javascript:void(0)"
                                                                        class="btn btn-instagram">Fees</a><span
                class="glyphicon glyphicon-sort"></span> <a href="javascript:void(0)"
                                                            class="btn btn-instagram">Ratings</a><span
                class="glyphicon glyphicon-sort"></span> <a href="javascript:void(0)"
                                                            class="btn btn-instagram">Coaches</a><span
                class="glyphicon glyphicon-sort"></span></div>
        <div class="cartBox" ng-if="categoryResults.length">
            <div class="row homeListItem" ng-click="goToProfile(item)"
                 ng-repeat="item in categoryResults">
                <div class="col-sm-4 col-md-4"><img ng-src='img/coachPhotos/{{item.categoryPhoto}}.png' width="100">
                </div>
                <div class="col-sm-4 col-md-4"><b>{{item.categoryName}}</b><br>{{item.categoryAddress}}<br>
                    <span class="glyphicon glyphicon-time"></span> Timings: {{item.categoryTiming}}<br>
                    Monthly Fee:<span class="itemPrice ng-binding"><i
                            class="fa fa-inr"></i>{{item.categoryFee}}</span><br>
                    <span class="">No. of Coaches: {{item.categoryNoOfCoaches}}</span>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div ng-class="ratings(item.categoryRating)" class="badgeRating bg-badge">
                        {{item.categoryRating | number:1}}
                    </div>
                    <span style="color:#6d6d6d">{{item.reviewCount}} Reviews</span><br>
                </div>
            </div>
            <p>THAT'S ALL FOLKS!</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="col-md-12 ">
            <div class="container-fluid right sponsored-box">
                <div class="sponsored-box">
                    <hr>
                    <div class="thumbnail">
                        <div class="caption">
                            <center><h3><a class="label label-success" href="#">XYZ Academy</a></h3></center>
                        </div>
                        <img src="images/img2.jpg" class="img-responsive img-rounded"></div>
                </div>
                <div class="sponsored-box">
                    <hr>
                    <div class="thumbnail">
                        <div class="caption">
                            <center><h3><a class="label label-success" href="#">XYZ Academy</a></h3></center>
                        </div>
                        <img src="images/img2.jpg" class="img-responsive img-rounded"></div>
                </div>
                <div class="sponsored-box">
                    <hr>
                    <div class="thumbnail">
                        <div class="caption">
                            <center><h3><a class="label label-success" href="#">XYZ Academy</a></h3></center>
                        </div>
                        <img src="images/img2.jpg" class="img-responsive img-rounded"></div>
                </div>
                <div class="sponsored-box">
                    <hr>
                    <div class="thumbnail">
                        <div class="caption">
                            <center><h3><a class="label label-success" href="#">XYZ Academy</a></h3></center>
                        </div>
                        <img src="images/img2.jpg" class="img-responsive img-rounded"></div>
                </div>
            </div>
        </div>
        <div class=""></div>
    </div>
</div>