// create the controller and inject Angular's $scope for itemDetails Controller
sportCircle.controller('itemDetailsCtrl',['$scope','$http','$location', function ($scope, $http, $location, $rootScope, $window, $modal) {

    $scope.itemDetails = {
        id: '1',
        itemName: 'First Academy',
        itemPhoto: 'photo',
        itemBackground: "",
        itemAddress: 'Matunga, Mumbai, Maharashtra 400019',
        itemRating: '4.5',
        itemReviewCount: '50',
        itemTiming: '5AM -5PM',
        itemNoOfCoaches: "7",
        itemFee: "2000",
        itemContact: [{"no": "8939279697"}, {"no": "8807358950"}],
        itemAbout: "The First Academy is Mumbai’s first of its kind Sports Academy providing Sports Coaching and Sports Training to Schools & Corporates. We have also sports & fitness development programs for individuals and groups. We are looking to create awareness for sports and fitness as an important part of physical and moral education.",
        itemHighlights: [{"hightlight":"hightlight1"},{"hightlight":"hightlight2"},{"hightlight":"hightlight3"}],
        itemCoachInfo:[],
        itemReviews:[{rating:"5",picture:"http://api.randomuser.me/portraits/women/17.jpg",name:"crazyswan955",message:"The First Academy is Mumbai’s first of its kind Sports Academy providing Sports Coaching and Sports Training to Schools & Corporates. We have also sports & fitness development programs for individuals and groups. We are looking to create awareness for sports and fitness as an important part of physical and moral education"},
            {rating:"4",picture:"http://api.randomuser.me/portraits/men/60.jpg",name:"goldenostrich474",message:"The First Academy is Mumbai’s first of its kind Sports Academy providing Sports Coaching and Sports Training to Schools & Corporates. We have also sports & fitness development programs for individuals and groups. We are looking to create awareness for sports and fitness as an important part of physical and moral education"},
            {rating:"3",picture:"http://api.randomuser.me/portraits/women/72.jpg",name:"blackkoala535",message:"The First Academy is Mumbai’s first of its kind Sports Academy providing Sports Coaching and Sports Training to Schools & Corporates. We have also sports & fitness development programs for individuals and groups. We are looking to create awareness for sports and fitness as an important part of physical and moral education"},
            {rating:"2",picture:"http://api.randomuser.me/portraits/men/5.jpg",name:"orangewolf999",message:"The First Academy is Mumbai’s first of its kind Sports Academy providing Sports Coaching and Sports Training to Schools & Corporates. We have also sports & fitness development programs for individuals and groups. We are looking to create awareness for sports and fitness as an important part of physical and moral education"},
            {rating:"1",picture:"http://api.randomuser.me/portraits/men/47.jpg",name:"biggorilla338",message:"The First Academy is Mumbai’s first of its kind Sports Academy providing Sports Coaching and Sports Training to Schools & Corporates. We have also sports & fitness development programs for individuals and groups. We are looking to create awareness for sports and fitness as an important part of physical and moral education"},
            {rating:"5",picture:"http://api.randomuser.me/portraits/women/36.jpg",name:"orangeswan60",message:"The First Academy is Mumbai’s first of its kind Sports Academy providing Sports Coaching and Sports Training to Schools & Corporates. We have also sports & fitness development programs for individuals and groups. We are looking to create awareness for sports and fitness as an important part of physical and moral education"}]

    };
    $http.get('http://api.randomuser.me/0.4/?results=20').success(function(data) {
        $scope.itemDetails.itemCoachInfo = data.results;
    }).error(function(data, status) {
        alert('get data error!');
    });
    /*Function to navigate to sports list screen*/
    $scope.goToProfile = function (item) {

        $location.path('/home/sportsCategoryFilter/'+1+'/itemDetails/' + item.id);
    }
}]);
