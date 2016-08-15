// create the controller and inject Angular's $scope
sportCircle.controller('academyCoachCtrl', function ($scope, $location, $http) {

    $scope.myInterval = 3000;
    var slides = $scope.slides = [];
    $scope.slides = [
        {
            text: "Game",
            image: 'http://lorempixel.com/600/300/sports'
        },
        {
            text: "Sport",
            image: 'http://lorempixel.com/600/300/sports/1'
        }
    ];
    $scope.acadCoaches = {
        coachPhoto: 'photo',
        acadCoachName: 'kiran kumar',
        acadCoachAddress: 'Vidyavihar, Mumbai, Maharashtra 400077',
        acadCoachRating: '4.5',
        reviewCount: '50',
        timing: '5AM- 5PM',
        mobileNumber1: '09898989898',
        mobileNumber2: '09797979797'
    };


    /*Service call to get the restaurant reviews*/
    $scope.acadCoachReviews = {
        review: 'a',
        reviews: [{
            picture: 'photo',
            rating: '2.5',
            name: 'Ashok',
            message: 'I know Academy has great selections of other stuff too - anything from athletic shoes, exercise equipment, guns, sport wear and sports team stuff ... plus more!  Academy is great!'
        }, {
            picture: 'photo',
            rating: '4.0',
            name: 'Arun',
            message: 'I know Academy has great selections of other stuff too - anything from athletic shoes, exercise equipment, guns, sport wear and sports team stuff ... plus more!  Academy is great!'
        }, {
            picture: 'photo',
            rating: '5',
            name: 'Ajay',
            message: 'I know Academy has great selections of other stuff too - anything from athletic shoes, exercise equipment, guns, sport wear and sports team stuff ... plus more!  Academy is great!'
        }, {
            picture: 'photo',
            rating: '3.0',
            name: 'Arya',
            message: 'I know Academy has great selections of other stuff too - anything from athletic shoes, exercise equipment, guns, sport wear and sports team stuff ... plus more!  Academy is great!'
        }]
    };
    /*condtion to show the menu card or to display previous screen*/
    $scope.returnHome = function () {
        $location.path('/home');
    }
});