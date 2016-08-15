sportCircle.controller('alertMsgCtrl', function ($scope, $modalInstance, alertContent) {
    /*Util function to display requiredalert message to the user*/
    $scope.alertMsg = alertContent;
    $scope.close = function () {
        $modalInstance.dismiss($scope.alertMsg);
    };
});