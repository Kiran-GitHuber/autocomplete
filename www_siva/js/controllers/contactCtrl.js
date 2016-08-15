sportCircle.controller('contactCtrl', function ($scope, $rootScope, $http) {
    $scope.sucessResponse = false;
    $scope.feedback = {};
    /*Function to show the dropdown values to the user while contacting customer support*/
    $scope.categories = [{id: 0, value: 'Question'}, {id: 1, value: 'Feedback'}, {id: 2, value: 'Feedforward'}];
    $scope.submitMessage = function () {
        if ($rootScope.userDetails && $rootScope.userDetails.email) {
            $scope.feedback.email = $rootScope.userDetails.email;
        }
        var customerSpeak = {
            email: $scope.feedback.email,
            category: $scope.feedback.category.value,
            message: $scope.feedback.message,
            captcha: $scope.feedback.captcha
        }
        /*Service call to receive the customer feedback */
        $http.post("service_contacts.php", customerSpeak).success(function (data, status, headers, config) {
            console.log("user Data inserted Successfully");

            $scope.feedbackResponse = data;
            if ($scope.feedbackResponse.result === "failure") {
                $scope.feedback.captcha = "";
                $scope.sucessResponse = false;

            } else {
                $scope.feedback = {email: "", message: "", captcha: "", category: ""};
                $scope.sucessResponse = true;
            }
            console.log($scope.feedbackResponse);
        }).error(function (error) {
            $scope.orderErr = JSON.stringify(error);
        });

    },
        $scope.backToForm = function () {
            $scope.sucessResponse = false;
        }
});