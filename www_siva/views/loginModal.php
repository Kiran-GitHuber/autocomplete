<?php header('Access-Control-Allow-Origin: *'); ?>
<div class="modal-header">
    <button type="button" class="close" data-ng-click="cancel()">
        <span class="glyphicon glyphicon-remove-circle fontSize25"></span>
    </button>
    <h3 class="modal-title fontLobster">Please Login To Proceed</h3>
</div>
<div class="modal-body">
    <div class="fontSize25 pull-right"
         tooltip="While logging in Facebook please use your mailId instead phone number as an UserId"
         tooltip-placement="left"><span class="glyphicon glyphicon-info-sign"></span></div>
    <p>{{message}}</p>
    <!--facebook button-->
    <button scope="public_profile,email" class="btn btn-block btn-social btn-facebook" ng-click="checkLoginState()">
        <i class="fa fa-facebook"></i><span>Sign up with facebook</span>
    </button>
    <button class="btn btn-block btn-social btn-google-plus" ng-click="gplusLogin()">

        <i class="fa fa-google-plus"></i><span>Sign up with Google</span>
    </button>
</div>
<div class="modal-footer" style="text-align: left !important">By signing up, I agree to thesportz's <a href="javascript:void(0)" ng-click="termsCondtions()">Terms of
            Service</a> and <a href="javascript:void(0)" ng-click="privacyPolicy()">Privacy Policy</a>
</div>