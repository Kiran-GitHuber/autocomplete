/**
 * Created by KIRANKUMAR on 07/26/2016.
 */

sportCircle.directive("scroll", function ($window) {
    return function (scope, element, attrs) {
        angular.element($window).bind("scroll", function () {
            if (this.pageYOffset > 0) {
                scope.boolChangeClass = true;

            } else {
                scope.boolChangeClass = false;
            }
            scope.$apply();
        });
    };
});
sportCircle.directive("uiBreadcrumb", function() {
    return {
        restrict: 'EA',
        templateUrl: '/views/breadcrumb.php'
    };
});
