sportCircle.controller('spUtilCtrl', function ($scope, $rootScope, $modal) {
    /*Util function to display alert message*/
    $rootScope.alertMsg = function (messageType, messageText) {
        /*Alert messages of type success,info, warning & danger*/
        var alertdetails = {msgType: messageType, msgText: messageText};
        var modalInstance = $modal.open({
            templateUrl: 'views/alertMsg.php',
            controller: 'alertMsgCtrl',
            resolve: {
                alertContent: function () {
                    return alertdetails;
                }
            }
        });
    },
        $rootScope.convertTime = function (time) {
            // Check correct time format and split into components
            time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

            if (time.length > 1) { // If time format correct
                time = time.slice(1);  // Remove full string match value
                time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
                time[0] = +time[0] % 12 || 12; // Adjust hours
            }
            return time.join(''); // return adjusted time or original string
        },
        /*Util function to display the color based on the value*/
        $rootScope.ratings = function (rate) {
            var r = Number(parseFloat(rate).toFixed(1));
            var rColor = "";
            if (r > 0 && r < 1) {
                rColor = 'r1-color';
            } else if (r >= 1 && r < 1.5) {
                rColor = 'r2-color';
            } else if (r >= 1.5 && r < 2) {
                rColor = 'o-color';
            } else if (r >= 2 && r < 2.5) {
                rColor = 'y1-color';
            } else if (r >= 2.5 && r < 3) {
                rColor = 'y2-color';
            } else if (r >= 3 && r < 3.5) {
                rColor = 'g1-color';
            } else if (r >= 3.5 && r < 4) {
                rColor = 'g2-color';
            } else if (r >= 4 && r < 4.5) {
                rColor = 'g3-color';
            } else if (r >= 4.5 && r <= 5) {
                rColor = 'g4-color';
            } else {
                rColor = 'gr1-color';
                console.log('No Reviews')
            }
            ;
            return rColor;
        },
        /*Util function to display rating with one decimal point*/
        $rootScope.textRating = function (text) {
            Number(text).toFixed(1);
        }
});