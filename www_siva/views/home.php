<?php header('Access-Control-Allow-Origin: *'); ?>
<!--<div id="loaderDiv" loader>
    <img src="img/ajax_loader.gif" class="ajax-loader"/>
</div>-->
<div class="text-center">
    <div class="container thumbImgPosition">
        <img ng-repeat="icon in bannerTopIcons" ng-src="{{icon.iconPath}}" height="50">
    </div>
    <div class="jumbotron homeScreen fontLobster">
        <h2 style="color:#ffffff">{{message}}</h2

        <div class="row">
            <!--<div class="col-md-4">
                <select ng-model="selectedCity" ng-options="city.cityName for city in cities"
                        ng-change='fselectedCity()'
                        class="homeDropdown">
                    <option value="">-- Select City --</option>
                </select>
            </div>-->
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <form class="" role="search">
                    <div class="input-group add-on"><input type="text" class="form-control" placeholder="Search any Academy/Tournament/Venue/Coach..."
                                                           name="srch-term" id="srch-term">

                        <div class="input-group-btn">
                            <button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <<!--button type="submit" class="btn btn-danger btn-large homeDropdown" ng-click=""><i
                        class="glyphicon glyphicon-search"></i>
                    search
                </button>-->
            </div>
            <!--<div class="form-group form-inline text-center has-feedback">
                <div style="margin-right:-10px; " class="input-group">
                    <div class="form-group selectlist">
                        <select class="" name="selected_sports[]" id="select_sport" multiple="multiple"
                                maximumselectionlength="5" placeholder="Select Sports" style="display: none;">
                            <option value="cricket" selected="selected">Cricket</option>
                            <option value="swimming">Swimming</option>
                            <option value="aqua">Aqua</option>
                            <option value="football">Football</option>
                            <option value="tennis">Tennis</option>
                            <option value="gym">Gym</option>
                            <option value="training">Training</option>
                            <option value="kabaddi">Kabaddi</option>
                            <option value="athletics">Athletics</option>
                            <option value="badminton">Badminton</option>
                            <option value="basketball">Basketball</option>
                            <option value="carrom">Carrom</option>
                            <option value="chess">Chess</option>
                            <option value="table tennis">Table Tennis</option>
                            <option value="vollyball">Vollyball</option>
                            <option value="boxing">Boxing</option>
                            <option value="wrestling">Wrestling</option>
                            <option value="hockey">Hockey</option>
                            <option value="billiards">Billiards</option>
                            <option value="snooker">Snooker</option>
                            <option value="archery">Archery</option>
                            <option value="golf">Golf</option>
                            <option value="cycling">Cycling</option>
                            <option value="traditional sports">Traditional Sports</option>
                        </select>

                        <div class="btn-group" style="width: 300px;">
                            <button type="button" class="multiselect dropdown-toggle btn btn-default"
                                    data-toggle="dropdown"
                                    title="Cricket"
                                    style="width: 300px; overflow: hidden; text-overflow: ellipsis;"><span
                                    class="multiselect-selected-text">Cricket</span> <b class="caret"></b></button>
                            <ul class="multiselect-container dropdown-menu"
                                style="max-height: 250px; overflow-y: auto; overflow-x: hidden;">
                                <li class="multiselect-item filter" value="0">
                                    <div class="input-group"><span class="input-group-addon"><i
                                                class="glyphicon glyphicon-search"></i></span><input
                                            class="form-control multiselect-search" type="text"
                                            placeholder="Search"><span
                                            class="input-group-btn"><button
                                                class="btn btn-default multiselect-clear-filter"
                                                type="button"><i
                                                    class="glyphicon glyphicon-remove-circle"></i></button></span></div>
                                </li>
                                <li class="multiselect-item multiselect-all"><a tabindex="0"
                                                                                class="multiselect-all"><label
                                            class="checkbox"><input type="checkbox" value="multiselect-all"> Select
                                            all</label></a></li>
                                <li class="active"><a tabindex="0"><label class="checkbox"><input type="checkbox"
                                                                                                  value="cricket">
                                            Cricket</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="swimming">
                                            Swimming</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="aqua">
                                            Aqua</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="football">
                                            Football</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="tennis">
                                            Tennis</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="gym">
                                            Gym</label></a>
                                </li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="training">
                                            Training</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="kabaddi">
                                            Kabaddi</label></a>
                                </li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="athletics">
                                            Athletics</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="badminton">
                                            Badminton</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="basketball">
                                            Basketball</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="carrom">
                                            Carrom</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="chess">
                                            Chess</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="table tennis">
                                            Table Tennis</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="vollyball">
                                            Vollyball</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="boxing">
                                            Boxing</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="wrestling">
                                            Wrestling</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="hockey">
                                            Hockey</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="billiards">
                                            Billiards</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="snooker">
                                            Snooker</label></a>
                                </li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="archery">
                                            Archery</label></a>
                                </li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="golf">
                                            Golf</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="cycling">
                                            Cycling</label></a>
                                </li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox"
                                                                                   value="traditional sports">
                                            Traditional
                                            Sports</label></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div style="margin-right:px;" class="input-group">
                    <input id="area" class="form-control search_input ui-autocomplete-input" name="query" style=""
                           placeholder="Search any Academy/Tournament/Venue/Coach..." autocomplete="off">
                </div>


                <button type="submit" class="btn btn-danger" name="search_sub">Search</button>
            </div>
        </div>
    </div>-->

        </div>
        <div class="row cartBox">
            <h3 class="text-center fontLobster">Categories</h3>

            <div ng-click="clickCategory(category)" ng-repeat="category in categories"
                 class="thumbImgPosition col-xs-6 col-sm-3">
                <a href="javascript:void(0)" class="catCircle">
                    <img ng-src="{{category.catImg}}" alt="{{category.catText}}">
                    <h4>{{category.catText}}</h4>
                </a>
            </div>
        </div>
        <div>
            <div class="cartBox row text-center">
                <h3 class="text-center fontLobster">Sports</h3>

                <div ng-click="clickSport(sport)" ng-repeat="sport in sportsList"
                     class="sportIconItem col-xs-4 col-sm-3 col-md-2 padTopBtm20 cursorPointer"><img
                        class="img-responsive imgCentre"
                        ng-src="{{sport.icon}}" width=80px"
                        alt="">
                    <span class="padLftRgt10">{{sport.text}}</span>
                </div>
            </div>
        </div>
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
        <div class="cartBox row">
            <div ng-repeat="category in categories" class="col-xs-6 col-sm-3">
                <div class="viewCard"><h4>{{category.catText}}</h4>
                    <hr class="">
                    <ul class="viewCardSec">
                        <li ng-repeat="list in category.list" class="">
                            <div><img class="img-responsive" ng-src="{{list.image}}" width=200px" alt="">
                            </div>
                            <span>{{list.text}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Add the extra clearfix for only the required viewport -->
            <!--<div class="clearfix visible-xs-block"></div>-->
        </div>
        <!--
                    <div class="col-xs-6 col-sm-3">
                        <div class="viewCard"><h4>Venues</h4>
                            <hr class="">
                            <ul class="grid cs-style-3">
                                <li>
                                    <figure><img class="img-responsive" src="img/shot06.png" width=200px" alt="">
                                        <figcaption>
                                            <h3>Mindblowing</h3>
                                            <span>lorem ipsume </span>
                                            <a class="fancybox" rel="group" href="img/coachPhotos/photo.png">Take a look</a>
                                        </figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img class="img-responsive" src="img/shot06.png" width=200px" alt="">
                                        <figcaption>
                                            <h3>Mindblowing</h3>
                                            <span>lorem ipsume </span>
                                            <a class="fancybox" rel="group" href="img/coachPhotos/photo.png">Take a look</a>
                                        </figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img class="img-responsive" src="img/shot06.png" width=200px" alt="">
                                        <figcaption>
                                            <h3>Mindblowing</h3>
                                            <span>lorem ipsume </span>
                                            <a class="fancybox" rel="group" href="img/coachPhotos/photo.png">Take a look</a>
                                        </figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img class="img-responsive" src="img/shot06.png" width=200px" alt="">
                                        <figcaption>
                                            <h3>Mindblowing</h3>
                                            <span>lorem ipsume </span>
                                            <a class="fancybox" rel="group" href="img/coachPhotos/photo.png">Take a look</a>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="viewCard"><h4>Coaches</h4>
                            <hr class="">
                            <ul class="grid cs-style-3">
                                <li>
                                    <figure><img class="img-responsive" src="img/shot06.png" width=200px" alt="">
                                        <figcaption>
                                            <h3>Mindblowing</h3>
                                            <span>lorem ipsume </span>
                                            <a class="fancybox" rel="group" href="img/coachPhotos/photo.png">Take a look</a>
                                        </figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img class="img-responsive" src="img/shot06.png" width=200px" alt="">
                                        <figcaption>
                                            <h3>Mindblowing</h3>
                                            <span>lorem ipsume </span>
                                            <a class="fancybox" rel="group" href="img/coachPhotos/photo.png">Take a look</a>
                                        </figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img class="img-responsive" src="img/shot06.png" width=200px" alt="">
                                        <figcaption>
                                            <h3>Mindblowing</h3>
                                            <span>lorem ipsume </span>
                                            <a class="fancybox" rel="group" href="img/coachPhotos/photo.png">Take a look</a>
                                        </figcaption>
                                    </figure>
                                </li>
                                <li>
                                    <figure><img class="img-responsive" src="img/shot06.png" width=200px" alt="">
                                        <figcaption>
                                            <h3>Mindblowing</h3>
                                            <span>lorem ipsume </span>
                                            <a class="fancybox" rel="group" href="img/coachPhotos/photo.png">Take a look</a>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>-->
        <!--<div ng-if="">
            <div class="row homeListItem" ng-click=""
                 ng-repeat="coach in coaches">
                <div class="col-md-3"><img ng-src='img/coachPhotos/{{coach.coachPhoto}}.png' width="100"></div>
                <div class="col-md-3"><b>{{coach.coach_name}}</b><br>{{coach.coach_address}}<br>

                    <div ng-class="ratings(coach.coach_rating)" class="badgeRating bg-badge" style="margin:auto;">
                        {{coach.coach_rating | number:1}}
                    </div>
                    <span style="color:#6d6d6d">{{coach.reviewCount}} Reviews</span><br>
                    <span class="glyphicon glyphicon-time"></span> Timings: {{coach.timing}}
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-success btn-lg btn-arrow">MORE DETAILS <i
                            class="fa fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            <p>THAT'S ALL FOLKS!</p>
        </div>-->