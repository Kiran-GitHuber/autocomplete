<?php header('Access-Control-Allow-Origin: *'); ?>
<!--<div id="loaderDiv" loader>
    <img src="img/ajax_loader.gif" class="ajax-loader"/>
</div>-->
<ol class="ab-nav breadcrumb">
    <li ng-repeat="breadcrumb in breadcrumbs.get() track by breadcrumb.path"
        ng-if="breadcrumb.label"
        ng-class="{ active: $last }">
        <a ng-if="!$last"
           ng-href="#{{ breadcrumb.path }}"
           ng-bind="breadcrumb.label"
           class="margin-right-xs"></a>
        <span ng-if="$last" ng-bind="breadcrumb.label"></span>
    </li>
</ol>