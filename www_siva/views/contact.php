<?php header('Access-Control-Allow-Origin: *'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div ng-if="!sucessResponse" class="col-md-6 contactForm">
            <form name="contactUsForm" novalidate>
                <h2 class="text-center fontLobster">We would love to hear from you</h2>

                <div class="form-group"
                     ng-class="{'has-error': contactUsForm.email.$invalid || contactUsForm.email.$error.email,'has-success':contactUsForm.email.$valid}">
                    <label for="email"></label>

                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input ng-if="userDetails.email" id="email" placeholder="Your Email Address" type="email"
                               name="email" ng-model="userDetails.email"
                               class="form-control" readonly/>
                        <input ng-if="!userDetails.email" id="email" placeholder="Your Email Address" type="email"
                               name="email" ng-model="feedback.email"
                               class="form-control" required/>
                    </div>
                    <span class="help-block" ng-show="contactUsForm.email.$error.email">Invalid email!!</span>
                </div>
                <div class="form-group"
                     ng-class="{'has-error':contactUsForm.category.$error.required,'has-success':contactUsForm.category.$valid}">
                    <label for="category"></label>

                    <select id="category" name="category" ng-model="feedback.category"
                            ng-options="category.value for category in categories" required="required"
                            class="form-control">
                        <option value="">-- Select category --</option>
                    </select>
                </div>
                <div class="form-group"
                     ng-class="{'has-error': contactUsForm.inputMessage.$error.required,'has-success':contactUsForm.inputMessage.$valid}">
                    <label for="inputMessage"></label>

                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-align-left"></span></div>
                        <textarea class="form-control" rows="4" id="inputMessage" name="inputMessage"
                                  ng-model="feedback.message"
                                  placeholder="Your message..." required="required"></textarea>
                    </div>
                </div>

                <img src="views/captcha.php" id="captcha"/><br/>

                <a href="javascript:void(0)" onclick="
    document.getElementById('captcha').src='views/captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
                   id="change-image">Not readable? <span class="glyphicon glyphicon-refresh"></span> Refresh
                    Captcha.</a><br/><br/>

                <div class="form-group"
                     ng-class="{'has-error': contactUsForm.captcha.$error.required,'has-success':contactUsForm.captcha.$valid}">
                    <div class="input-group">
                        <span class="input-group-addon">#</span>
                        <input class="form-control" type="text" placeholder="Enter your captcha text here..."
                               name="captcha"
                               id="captcha-form" autocomplete="off"
                               ng-model="feedback.captcha" required="required"/>
                    </div>
                    <span ng-if="feedbackResponse.result === 'failure'" class="help-block"
                          ng-show="contactUsForm.captcha.$error.required">Invalid captcha</span>
                </div>
                <button type="submit" class="btn btn-success btn-large"
                        ng-disabled="contactUsForm.$invalid" ng-click="submitMessage()">
                    submit
                </button>
            </form>
        </div>
        <div ng-if="sucessResponse" class="col-md-6 cartBox fontLobster bg-success text-center alert alert-success"><h3>
            <i class="fa fa-check"></i> Your request have been considered successfully</h3><br>Back to <a
                ng-click="backToForm()">Contact Us</a> form
        </div>
        <div class="col-md-3"></div>
        <!--<div class="col-md-3 callUsBanner">
            <h2 class="fontLobster">Call Us</h2>

            <h3>XXX-XXXXXXXX</h3>
            <address>
                <h3 class="fontLobster">Office Location</h3>

                <p class="lead"><a
                        href=""
                        target="_blank">
                    CL Towers<br>
                    Chennai</a><br>
                    Phone: XXX-XXX-XXXX<br>
                    Fax: XXX-XXX-XXXX</p>
            </address>
        </div>-->
        <div class="col-md-2"></div>
    </div>
</div>