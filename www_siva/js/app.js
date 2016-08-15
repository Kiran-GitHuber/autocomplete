// create the module and name it sportCircle
var sportCircle = angular.module('sportCircle', ['ngRoute', 'ui.bootstrap', 'ng-breadcrumbs']);
// configure our routes
sportCircle.config(function ($routeProvider, $locationProvider) {
    $routeProvider
        // route for the home page
        .when('/home', {
            templateUrl: 'views/home.php',
            controller: 'homeCtrl',
            label: 'Home'
        })
        // route for the about page
        .when('/about', {
            templateUrl: 'views/about.php',
            controller: 'aboutCtrl'
        })
        // route for the contact page
        .when('/contact', {
            templateUrl: 'views/contact.php',
            controller: 'contactCtrl'
        })
        //route for the restaurant page
        .when('/acadCoach/:acadCoachId', {
            templateUrl: 'views/academyCoach.php',
            controller: 'academyCoachCtrl'
        })

        // route for the terms page
        .when('/termsandConditions', {
            templateUrl: 'views/terms.php',
            controller: 'termsCtrl'
        })
        // route for the privacy page
        .when('/privacyPolicy', {
            templateUrl: 'views/privacy.php',
            controller: 'privacyCtrl'
        })
        //route for the sports in category page
        .when('/sportsList/:id', {
            templateUrl: 'views/sportsList.php',
            controller: 'sportsListCtrl'
        })
        //route for the sports filter and sort options for user
        .when('/home/sportsCategoryFilter/:id', {
            templateUrl: 'views/sportsCategoryFilter.php',
            controller: 'sportsCategoryFilterCtrl',
            label: 'SportsCategory'
        })
        //route for the itemdetails controller
        .when('/home/sportsCategoryFilter/:id/itemDetails/:rid', {
            templateUrl: 'views/itemDetails.php',
            controller: 'itemDetailsCtrl',
            label: 'FullDetails'
        })
        .otherwise({
            redirectTo: '/home'

        });

}).run(function ($rootScope, $location, $modal,$window) {
    $rootScope.$on("$routeChangeStart", function (event, toState, toParams, fromState, fromParams) {
        if (toState.authenticate && $rootScope.loggedIn === false) {
            /*var modalInstance = $modal.open({
             templateUrl: 'views/loginModal.php',
             controller: 'loginCtrl'
             });*/
            $location.path('/home')
        }
    });
    $rootScope.$on("$routeChangeSuccess", function (event, currentRoute, previousRoute) {
        $window.scrollTo(0, 0);
    });
}).factory('httpInterceptor', function ($q, $rootScope, $log) {

    var numLoadings = 0;

    return {
        request: function (config) {

            numLoadings++;

            // Show loader
            $rootScope.$broadcast("loader_show");
            return config || $q.when(config);
        },
        response: function (response) {

            if ((--numLoadings) === 0) {
                // Hide loader
                $rootScope.$broadcast("loader_hide");
            }

            return response || $q.when(response);

        },
        responseError: function (response) {

            if (!(--numLoadings)) {
                // Hide loader
                $rootScope.$broadcast("loader_hide");
            }

            return $q.reject(response);
        }
    };
}).config(function ($httpProvider) {
    $httpProvider.interceptors.push('httpInterceptor');
}).directive("loader", function ($rootScope) {
    return function ($scope, element, attrs) {
        $scope.$on("loader_show", function () {
            return element.show();
        });
        return $scope.$on("loader_hide", function () {
            return element.hide();
        });
    };
});