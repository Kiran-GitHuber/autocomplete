// create the controller and inject Angular's $scope
sportCircle.controller('sportsListCtrl', function ($scope, $http, $location, $rootScope, $window, $modal) {
    $rootScope.returnFlow;
    $scope.myInterval = 3000;
    var slides = $scope.slides = [];
    $scope.slides = [
        {
            text: "",
            image: 'img/shot01.jpg'
        },
        {
            text: "",
            image: 'img/shot02.jpg'
        },
        {
            text: "",
            image: 'img/shot03.jpg'
        },
        {
            text: "Game",
            image: 'http://lorempixel.com/600/300/sports'
        },
        {
            text: "Game",
            image: 'http://lorempixel.com/600/300/sports/1'
        }
    ];
});
