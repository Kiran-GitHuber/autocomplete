// create the controller and inject Angular's $scope
sportCircle.controller('coachListCtrl', function ($scope, $http, $location, $rootScope, $window, $modal) {
    $scope.message = 'Hello! Search Coach or Academy';
    $rootScope.returnFlow;
    $scope.selectedItems = {};
    $scope.cities = [{cityName: 'Mumbai'}, {cityName: 'Hyderabad'}, {cityName: 'Chennai'}];
    /*Service call to get the areas of selected city*/
    $scope.fselectedCity = function () {
        $scope.areas = [{area_name: 'Vidyanagar'}];
    };
    /*Service call to get the cuisine types of selected area*/
    $scope.fselectedArea = function () {
            $scope.types = [{coach_type: 'Academy'},{coach_type: 'Individual'}];;

    };
    $scope.fselectedType = function () {
            $scope.coaches = [{id:'1',coach_name:'kiran kumar',coachPhoto:'photo', coach_address:'Vidyavihar, Mumbai, Maharashtra 400077',coach_rating:'4.5',reviewCount:'50',coachCount:'',timing:'5AM -5PM'},{id:'2',coach_name:'Sunrise',coachPhoto:'photo',coach_address:'Somaiya Running Track, Mumbai, Maharashtra 400077',coach_rating:'4',reviewCount:'50',coachCount:'10',timing:'5AM -4PM'}];
    };
    /*Function to navigate to restaurant screen*/
    $scope.clickRes = function (coach) {

            $location.path('/acadCoach/' + coach.id);
    }
});
