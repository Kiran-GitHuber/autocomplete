// create the controller and inject Angular's $scope
sportCircle.controller('mainCtrl', ['$scope','$modal','$rootScope','userDetailsStore','$window', '$timeout','$location','$http','breadcrumbs', function ($scope, $modal, $rootScope, userDetailsStore, $window, $timeout, $location, $http, breadcrumbs) {
    /*var modalInstance = $modal.open({
        templateUrl: 'views/landingScreen.html',
        controller: 'landingScreenCtrl'
    });*/
    //Retrieve the gmail object from storage
    $scope.breadcrumbs = breadcrumbs;
    $rootScope.userDetails = JSON.parse(userDetailsStore.getData()) || {};
    $rootScope.loggedIn = false;
    if (Object.keys($rootScope.userDetails).length > 0) {
        $rootScope.loggedIn = true;
    }
    $scope.openLoginModal = function () {
        var modalInstance = $modal.open({
            templateUrl: 'views/loginModal.php',
            controller: 'loginCtrl'
        });
    };
    $rootScope.$on('userDetails', function (object, data) {
        $rootScope.loggedIn = true;
        // Put the object into storage
        userDetailsStore.setData(data);
        // Retrieve the object from storage
        $rootScope.userDetails = JSON.parse(userDetailsStore.getData());
        $rootScope.adminFlow = $rootScope.userDetails.adminFlow;
        $rootScope.userPayBackPoints = $rootScope.userDetails.paybackPoints;
        $rootScope.minRedeemPoints = $rootScope.userDetails.minPaybackPoints;
        $rootScope.redeemAmt = $rootScope.minRedeemPoints - ($rootScope.minRedeemPoints * 0.2);
        if ($rootScope.userDetails.adminFlow === false && $rootScope.wrtReview === true) {
            var modalInstance = $modal.open({
                templateUrl: 'views/review.html',
                controller: 'reviewCtrl'
            });
        }
        $timeout(function () {
            $rootScope.$apply();
        });
    });
    $scope.logoutMail = function () {
        $http.get('service_logout.php').then(function (response) {
            $scope.logoutResponse = response.data;
            if (response.data.result === "success") {
                //clear local storage
                $window.localStorage.removeItem('my-storage');
                //reload after clearing the local storage
                location.reload();
                if ($rootScope.userDetails.authMethod === 1) {
                    /*window.location.href = "https://www.google.com/accounts/Logout";*/
                } else if ($rootScope.userDetails.authMethod === 2) {
                    FB.logout(function (response) {
                        /*FB.Auth.setAuthResponse(null, 'unknown');*/
                        // Person is now logged out
                    });
                } else {
                    console.log("Not FB/Gmail logout");
                }
                $location.path('/order');
                location.reload();
            }
        }, function (error) {
            $scope.orderErr = JSON.stringify(error);
        });
    },
        $scope.gototop = function () {
            var scrollStep = -$window.scrollY / ($window.scrollY / 60),
                scrollInterval = setInterval(function () {
                    if ($window.scrollY != 0) {
                        $window.scrollBy(0, scrollStep);
                    }
                    else clearInterval(scrollInterval);
                }, 15);
        },
        $scope.usrCpnHistory = function () {
            if ($rootScope.userDetails.adminFlow === false) {
                $location.path('/usrCpnHistory');
                console.log("adminFlow" + $rootScope.userDetails.adminFlow);
            }
        },
        $scope.usrRcgHistory = function () {
            if ($rootScope.userDetails.adminFlow === false) {
                $location.path('/usrRcgHistory');
                console.log("adminFlow" + $rootScope.userDetails.adminFlow);
            }
        },
        $scope.admCpnDetails = function () {
            if ($rootScope.userDetails.adminFlow === true) {
                $location.path('/admCpnDetails');
                console.log("adminFlow" + $rootScope.userDetails.adminFlow);
            }
        },
        $scope.admRcgRequest = function () {
            if ($rootScope.userDetails.adminFlow === true) {
                $location.path('/admRcgRequest');
                console.log("adminFlow" + $rootScope.userDetails.adminFlow);
            }
        },
        $scope.admReviewList = function () {
            if ($rootScope.userDetails.adminFlow === true) {
                $location.path('/admReviewList');
                console.log("adminFlow" + $rootScope.userDetails.adminFlow);
            }
        },
        $scope.termsCondtions = function () {
            window.open("http://www.foodpatra.com/#/termsandConditions", '_blank');

        },
        $scope.privacyPolicy = function () {
            window.open("http://www.foodpatra.com/#/privacyPolicy", '_blank');
        },
        $scope.fbPage = function () {
            window.open("https://www.facebook.com/profile.php?id=100009201035043", '_blank');
        },
        $scope.gmailPage = function () {
            window.open("https://plus.google.com/b/112234643631111798620/", '_blank');
        },
        $scope.twitterPage = function () {
            window.open("", '_blank');
        }
}]);

sportCircle.factory("userDetailsStore", function ($window, $rootScope) {
    angular.element($window).on('storage', function (event) {
        if (event.key === 'my-storage') {
            $rootScope.$apply();
        }
    });
    return {
        setData: function (val) {
            $window.localStorage && $window.localStorage.setItem('my-storage', JSON.stringify(val));
            return this;
        },
        getData: function () {
            return $window.localStorage && $window.localStorage.getItem('my-storage');
        }
    };
});
