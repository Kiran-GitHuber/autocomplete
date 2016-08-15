sportCircle.controller('loginCtrl', ['$scope', '$modalInstance','$modal','$rootScope','$http','$window',function ($scope, $modalInstance, $modal, $rootScope, $http, $window) {
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };

    /* Gplus login*/
    $scope.gplusLogin = function () {
        var myParams = {
            //'clientid': '213004242297-ml8j96nfke9ormlm6mhod0b3s0vgqu91.apps.googleusercontent.com',
            'clientid': '1007573047446-ag43q21fof81vefc901i6l4nfsoosa1l.apps.googleusercontent.com',
            //'clientid': '1007573047446-p65c8f1n9l0elifb8djl8p69tqc2pih0.apps.googleusercontent.com',
            'cookiepolicy': 'single_host_origin',
            'callback': loginCallback,
            'approvalprompt': 'auto',
            'scope': 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
        };
        $modalInstance.dismiss('cancel');
        gapi.auth.signIn(myParams);

        function loginCallback(result) {
            if (result['status']['signed_in']) {
                token = result['access_token'];
                /*$.ajax({
                 url: 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' + token,
                 data: null,
                 success: function (resp) {
                 if(resp.hasOwnProperty("email")){
                 console.log("gmailresp: "+JSON.stringify(resp));
                 var gmailObj = {};
                 $http.post("user_info.php", resp).success(function (data, status, headers, config) {
                 gmailObj = data;
                 }).error(function (error) {
                 $scope.orderErr = JSON.stringify(error);
                 });
                 }else {
                 $rootScope.alertMsg("danger", "We have experienced a problem while logging you into gmail. Please login with your facebook account or try after sometime");
                 }
                 },
                 dataType: "jsonp"
                 })*/

                gapi.client.load('plus', 'v1', getUserInformation);
            }
        }

        function getUserInformation() {
            var request = gapi.client.plus.people.get({'userId': 'me'});
            request.execute(function (resp) {
                console.log('Google+ Login RESPONSE: ' + angular.toJson(resp));
                delete resp.result.etag;
                var gmailObj = {};
                $http.post("user_info.php", resp.result).success(function (data, status, headers, config) {
                    gmailObj = data;
                    if (gmailObj.result === 'failure') {
                        $rootScope.alertMsg("danger", "We have experienced a problem while logging you into gmail. Please login with your facebook account or try after sometime");
                    } else {
                        $rootScope.$broadcast('userDetails', gmailObj);
                    }
                });
            });
        }
    };
    //facebook login starts
    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            //document.getElementById('status').innerHTML = 'Please log ' +
            //'into this app.';
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            //document.getElementById('status').innerHTML = 'Please log ' +
            //'into Facebook.';
        }
    }

    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    $scope.checkLoginState = function () {
        FB.login(function (response) {
            // Handle the response object, like in statusChangeCallback() in our demo
            // code.
            if (response.status !== "unknown") {
                testAPI();
            }
        }, {scope: 'public_profile,email'});
        $modalInstance.dismiss('cancel');
    }

    window.fbAsyncInit = function () {
        FB.init({
            appId: '1664185150488092',
            cookie: false,  // enable cookies to allow the server to access
            status: false, // the session
            xfbml: true,  // parse social plugins on this page
            version: 'v2.5' // use version 2.5
        });

        // Now that we've initialized the JavaScript SDK, we call
        // FB.getLoginStatus().  This function gets the state of the
        // person visiting this page and can return one of three states to
        // the callback you provide.  They can be:
        //
        // 1. Logged into your app ('connected')
        // 2. Logged into Facebook, but not your app ('not_authorized')
        // 3. Not logged into Facebook and can't tell if they are logged into
        //    your app or not.
        //
        // These three cases are handled in the callback function.
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        }, true);
    };

    // Load the SDK asynchronously
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Here we run a very simple test of the Graph API after login is
    // successful.  See statusChangeCallback() for when this call is made.
    function testAPI() {
        FB.api('/me','get', {fields: 'email,first_name,id,gender,last_name,link,locale,name,timezone,updated_time,verified'}, function (response) {
            console.log('Successful login for: ', response);
            if (response.hasOwnProperty("email")) {
                var fbObj = {};
                $http.post("user_facebook_info.php", response).success(function (data, status, headers, config) {
                    fbObj = data;
                    console.log('fbObj', fbObj);
                    $rootScope.$broadcast('userDetails', fbObj);
                }).error(function (error) {
                    $scope.orderErr = JSON.stringify(error);
                });
            } else {
                FB.logout(function (response) {
                    /*FB.Auth.setAuthResponse(null, 'unknown');*/
                    // Person is now logged out
                });
                $rootScope.alertMsg("danger", "Please login FB with emailId only!");
            }
        });
    }


    //facebook login ends

}]);
