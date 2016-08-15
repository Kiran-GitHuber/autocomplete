// create the controller and inject Angular's $scope
sportCircle.controller('sportsCategoryFilterCtrl', ['$scope','$http','$location','$rootScope', '$window', '$modal','$routeParams',function ($scope, $http, $location,$rootScope, $window, $modal,$routeParams) {
        $scope.categories = [{
            id: "1", type: "Academies"
        }, {
            id: "2", type: "Tournaments"
        }, {
            id: "3", type: "Venues"
        }, {
            id: "4", type: "Coaches"
        }];
        $scope.sportsList = [
            {
                id: "0", type: "Select All"
            },
            {
                id: "1", type: "Cricket"
            }, {
                id: "2", type: "Archer"
            },
            {
                id: "3", type: "Badminton"
            },
            {
                id: "4", type: "Boxing"
            },
            {
                id: "5", type: "Diving"
            },
            {
                id: "6", type: "Sprinting"
            },
            {
                id: "7", type: "Fencing"
            },
            {
                id: "8", type: "Gymnast"
            },
            {
                id: "9", type: "Basketball"
            },
            {
                id: "10", type: "Cycling"
            },
            {
                id: "11", type: "Swimming"
            },
            {
                id: "12", type: "Volleyball"
            }
        ];
        $scope.filterBy = {
            "genders": [
                {
                    "id": "1",
                    "type": "Male"
                },
                {
                    "id": "2",
                    "type": "Female"
                },
                {
                    "id": "3",
                    "type": "Unisex"
                }
            ],
            "facilities": [
                {
                    id: "0", type: "Select All"
                },
                {
                    "id": "1",
                    "type": "Canteen"
                },
                {
                    "id": "2",
                    "type": "Drinking water"
                },
                {
                    "id": "3",
                    "type": "Parking"
                },
                {
                    "id": "4",
                    "type": "Markings"
                },
                {
                    "id": "5",
                    "type": "First Aid"
                },
                {
                    "id": "6",
                    "type": "Washroom"
                },
                {
                    "id": "7",
                    "type": "Travel support"
                },
                {
                    "id": "8",
                    "type": "Restroom"
                },
                {
                    "id": "9",
                    "type": "Equipments"
                },
                {
                    "id": "10",
                    "type": "Highlights"
                },
                {
                    "id": "11",
                    "type": "Commentary"
                },
                {
                    "id": "12",
                    "type": "Umpire"
                },
                {
                    "id": "13",
                    "type": "Refreshments"
                },
                {
                    "id": "14",
                    "type": "Video recording"
                },
                {
                    "id": "15",
                    "type": "Basic equipment"
                },
                {
                    "id": "16",
                    "type": "Dougout"
                },
                {
                    "id": "17",
                    "type": "Score card"
                },
                {
                    "id": "18",
                    "type": "Shower"
                },
                {
                    "id": "19",
                    "type": "Boundary markings"
                },
                {
                    "id": "20",
                    "type": "Flood lights"
                }
            ],
            "areas": [
                {
                    "pin": "239",
                    "name": "Select All"
                },
                {
                    "pin": "400052",
                    "name": "Khar west"
                },
                {
                    "pin": "400050",
                    "name": "Bandra West"
                },
                {
                    "pin": "400019",
                    "name": "Matunga"
                },
                {
                    "pin": "400020",
                    "name": "Church Gate"
                },
                {
                    "pin": "400049",
                    "name": "Juhu"
                },
                {
                    "pin": "400051",
                    "name": "Khar east"
                }
            ]
        };
        $scope.sortBy = [{type: "A-Z"}, {type: "Fees"}, {type: "Ratings"}, {type: "Coaches"}];
        $scope.categoryResults = [{
            rid: '1',
            categoryName: 'First Academy',
            categoryPhoto: 'photo',
            categoryAddress: 'Matunga, Mumbai, Maharashtra 400019',
            categoryRating: '4.5',
            reviewCount: '50',
            categoryTiming: '5AM -5PM',
            categoryNoOfCoaches: "7",
            categoryFee: "2000"
        }, {
            rid: '2',
            categoryName: 'Second Academy',
            categoryPhoto: 'photo',
            categoryAddress: 'Juhu, Mumbai, Maharashtra 400049',
            categoryRating: '2',
            reviewCount: '50',
            categoryTiming: '5AM -5PM',
            categoryNoOfCoaches: "10",
            categoryFee: "1000"
        },{
            rid: '3',
            categoryName: 'Third Academy',
            categoryPhoto: 'photo',
            categoryAddress: 'Bandra West, Mumbai, Maharashtra 400050',
            categoryRating: '3.5',
            reviewCount: '10',
            categoryTiming: '5AM -5PM',
            categoryNoOfCoaches: "2",
            categoryFee: "3000"
        }];
        /*Function to navigate to sports list screen*/
        $scope.goToProfile = function (item) {
            $location.path('/home/sportsCategoryFilter/'+$routeParams.id+'/itemDetails/' + item.rid);
        }
    }]);
