<?php header('Access-Control-Allow-Origin: *'); ?>
<!--<div id="loaderDiv" loader>
    <img src="img/ajax_loader.gif" class="ajax-loader"/>
</div>-->
<div class="text-center">
    <div class="jumbotron homeScreen fontLobster">
        <h2 style="color:#ffffff">{{message}}</h2>

        <div>
            <!--<div class="well">-->
            <select ng-model="selectedCity" ng-options="city.cityName for city in cities" ng-change='fselectedCity()'
                    class="homeDropdown">
                <option value="">-- Select City --</option>
            </select>

            <select ng-model="selectedArea" ng-disabled="!selectedCity" ng-options="area.area_name for area in areas"
                    ng-change='fselectedArea()' class="homeDropdown">
                <option value="">-- Select Area --</option>
            </select>
            <select ng-model="selectedType" ng-disabled="!selectedCity || !selectedArea"
                    ng-options="type.coach_type for type in types" ng-change='fselectedType()'
                    class="homeDropdown">
                <option value="">-- Select Coach Type --</option>
            </select>
        </div>
    </div>
    <div ng-if="coaches.length">
        <div class="row homeListItem" ng-click="clickRes(coach)"
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
                </button>
            </div>
        </div>
        <p>THAT'S ALL FOLKS!</p>
    </div>
</div>