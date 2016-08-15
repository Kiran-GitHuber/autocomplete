// create the controller and inject Angular's $scope
sportCircle.controller('homeCtrl', ['$scope', '$http', '$location', '$rootScope', function ($scope, $http, $location, $rootScope, $window, $modal) {
    $scope.message = 'Hello! Get your sports on';
    $rootScope.returnFlow;
    $scope.myInterval = 3000;
    var slides = $scope.slides = [];
    $scope.academyDetails = [
        {
            name: "ABC Academy",
            area: "Khar west",
            category: "Academies",
            sports: ["Cricket", "Archer", "Badminton", "Boxing", "Diving", "Sprinting", "Fencing", "Gymnast", "Basketball", "Cycling", "Swimming", "Volleyball"],
            genders: ["Male", "Female", "Unisex"],
            Facilities: ["Canteen", "Drinking water", "Parking", "Markings", "First Aid", "Washroom", "Travel support", "Restroom", "Equipments", "Highlights",
                "Commentary", "Umpire", "Refreshments", "Video recording", "Basic equipment", "Dougout", "Score card", "Shower", "Boundary markings", "Flood lights"]
        },
        {name: "XYZ Academy", category: "Academies", sport: "Archer"},
        {name: "WXY Academy", category: "Academies", sport: "Badminton"},
        {name: "VWX Academy", category: "Academies", sport: "Boxing"},
        {name: "UVW Academy", category: "Academies", sport: "Diving"},
        {name: "TUV Academy", category: "Academies", sport: "Cricket"},
        {name: "STU Academy", category: "Academies", sport: "Sprinting"},
        {name: "RST Academy", category: "Academies", sport: "Diving"},
        {name: "CDE Academy", category: "Academies", sport: "Fencing"},
        {name: "BCD Academy", category: "Academies", sport: "Fencing"},
        {name: "QRS Academy", category: "Academies", sport: "Badminton"},
        {name: "DEF Academy", category: "Academies", sport: "Volleyball"},

        {name: "Abcdef", category: "Coaches", sport: "Diving"},
        {name: "Bcdefg", category: "Coaches", sport: "Cricket"},
        {name: "Cdefgh", category: "Coaches", sport: "Gymnast"},
        {name: "Defghi", category: "Coaches", sport: "Diving"},
        {name: "Efghij", category: "Coaches", sport: "Basketball"},
        {name: "Fghijk", category: "Coaches", sport: "Fencing"},
        {name: "Abcdef", category: "Coaches", sport: "Swimming"},
        {name: "Bcdefg", category: "Coaches", sport: "Gymnast"},
        {name: "Cdefgh", category: "Coaches", sport: "Sprinting"},
        {name: "Defghi", category: "Coaches", sport: "Basketball"},
        {name: "Efghij", category: "Coaches", sport: "Cycling"},
        {name: "Fghijk", category: "Coaches", sport: "Swimming"},

        {name: "DY Patil Stadium", category: "Venues", sport: "Football"},
        {name: "DY Patil Stadium", category: "Venues", sport: "Cricket"},
        {name: "Bombay Gymkhana", category: "Venues", sport: "Sprinting"},
        {name: "Mahalaxmi Racecourse", category: "Venues", sport: "Horse Racing"},
        {name: "Andheri Sports Complex", category: "Venues", sport: "Diving"},
        {name: "Cooperage Ground", category: "Venues", sport: "Basketball"},
        {name: "Cross Maidan", category: "Venues", sport: "Fencing"},
        {name: "Oval Ground", category: "Venues", sport: "Swimming"},
        {name: "Wankhede Stadium", category: "Venues", sport: "Gymnast"},
        {name: "Sardar Vallabhbhai Patel Indoor Stadium", category: "Venues", sport: "Boxing"},
        {name: "Rashtriya Chemicals & Fertilisers Company Ground", category: "Venues", sport: "Basketball"},
        {name: "Parsi Gymkhana Ground", category: "Venues", sport: "Cycling"},
        {name: "Dadaji Kondadev Stadium", category: "Venues", sport: "Swimming"},


        {name: "Startup Cricket League", category: "tournaments", sport: "Football"},
        {name: "Mumbai Half Marathon", category: "tournaments", sport: "Cricket"},
        {name: "Bombay Gymkhana", category: "tournaments", sport: "Sprinting"},
        {name: "Mahalaxmi Racecourse", category: "tournaments", sport: "Horse Racing"},
        {name: "Andheri Sports Complex", category: "tournaments", sport: "Diving"},
        {name: "Cooperage Ground", category: "tournaments", sport: "Basketball"},
        {name: "Cross Maidan", category: "tournaments", sport: "Fencing"},
        {name: "Oval Ground", category: "tournaments", sport: "Swimming"},
        {name: "Wankhede Stadium", category: "tournaments", sport: "Gymnast"},
        {name: "Sardar Vallabhbhai Patel Indoor Stadium", category: "tournaments", sport: "Boxing"},
        {name: "Rashtriya Chemicals & Fertilisers Company Ground", category: "tournaments", sport: "Basketball"},
        {name: "Parsi Gymkhana Ground", category: "tournaments", sport: "Cycling"},
        {name: "Dadaji Kondadev Stadium", category: "tournaments", sport: "Swimming"}
    ];
    $scope.bannerTopIcons = [
        {iconPath: "./img/icons/archery_icon.png"},
        {iconPath: "./img/icons/cricket_icon.png"},
        {iconPath: "./img/icons/cycling_icon.png"},
        {iconPath: "./img/icons/basketBall_icon.png"},
        {iconPath: "./img/icons/weightLifting_Icon.png"},
        {iconPath: "../img/icons/fastRunner_icon.png"},
        {iconPath: "./img/icons/hockey_icon.png"},
        {iconPath: "./img/icons/swimming_icon.png"},
        {iconPath: "./img/icons/shooting_icon.png"}
    ];
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
            image: 'https://unsplash.it/1200/360?image=622'
        },
        {
            text: "Game",
            image: 'https://unsplash.it/1200/360?image=401'
        },{
            text: "Game",
            image: 'https://unsplash.it/1200/360?image=623'
        }
    ];
    $scope.categories = [{
        id: "1", catText: "Academies", catImg: "img/Academy.png", list: [
            {
                text: "click here",
                image: 'img/shot06.png'
            },
            {
                text: "click here",
                image: 'img/shot06.png'
            },
            {
                text: "click here",
                image: 'img/shot06.png'
            },
            {
                text: "click here",
                image: 'img/shot06.png'
            }
        ]
    }, {
        id: "2", catText: "Tournaments", catImg: "img/Tournament.png", list: [
            {
                text: "click here",
                image: 'img/shot06.png'
            },
            {
                text: "click here",
                image: 'img/shot06.png'
            },
            {
                text: "click here",
                image: 'img/shot06.png'
            },
            {
                text: "click here",
                image: 'img/shot06.png'
            }
        ]
    }, {
        id: "3", catText: "Venues", catImg: "img/venue2.png", list: [
            {
                text: "click here",
                image: 'img/shot06.png'
            },
            {
                text: "click here",
                image: 'img/shot06.png'
            },
            {
                text: "click here",
                image: 'img/shot06.png'
            },
            {
                text: "click here",
                image: 'img/shot06.png'
            }
        ]
    }, {
        id: "4", catText: "Coaches", catImg: "img/Coach.png", list: [
            {
                text: "click here",
                image: 'img/shot06.png'
            },
            {
                text: "click here",
                image: 'img/shot06.png'
            },
            {
                text: "click here",
                image: 'img/shot06.png'
            },
            {
                text: "click here",
                image: 'img/shot06.png'
            }
        ]
    }];
    $scope.coaches = [{
        id: '1',
        coach_name: 'kiran kumar',
        coachPhoto: 'photo',
        coach_address: 'Vidyavihar, Mumbai, Maharashtra 400077',
        coach_rating: '4.5',
        reviewCount: '50',
        coachCount: '',
        timing: '5AM -5PM'
    }, {
        id: '2',
        coach_name: 'Sunrise',
        coachPhoto: 'photo',
        coach_address: 'Somaiya Running Track, Mumbai, Maharashtra 400077',
        coach_rating: '4',
        reviewCount: '50',
        coachCount: '10',
        timing: '5AM -4PM'
    }];
    $scope.selectedItems = {};
    $scope.cities = [{cityName: 'Mumbai'}, {cityName: 'Hyderabad'}, {cityName: 'Chennai'}];
    /*Service call to get the areas of selected city*/
    $scope.fselectedCity = function () {
        $scope.areas = [{area_name: 'Vidyanagar'}];
    };
    /*Service call to get the cuisine types of selected area*/
    $scope.fselectedArea = function () {
        $scope.types = [{coach_type: 'Academy'}, {coach_type: 'Individual'}];
        ;

    };
    $scope.sportsList = [
        {
            id: "1", text: "Cricket", icon: "img/sportColorIcons/cricket.png"
        }, {
            id: "2", text: "Archer", icon: "img/sportColorIcons/archer.png"
        },
        {
            id: "3", text: "Badminton", icon: "img/sportColorIcons/badminton.png"
        },
        {
            id: "4", text: "Boxing", icon: "img/sportColorIcons/boxer.png"
        },
        {
            id: "5", text: "Diving", icon: "img/sportColorIcons/diving-1.png"
        },
        {
            id: "6", text: "Sprinting", icon: "img/sportColorIcons/sprinter.png"
        },
        {
            id: "7", text: "Fencing", icon: "img/sportColorIcons/fencing.png"
        },
        {
            id: "8", text: "Gymnast", icon: "img/sportColorIcons/gymnast.png"
        },
        {
            id: "9", text: "Basketball", icon: "img/sportColorIcons/basketball.png"
        },
        {
            id: "10", text: "Cycling", icon: "img/sportColorIcons/biker.png"
        },
        {
            id: "11", text: "Swimming", icon: "img/sportColorIcons/swimming.png"
        },
        {
            id: "12", text: "Volleyball", icon: "img/sportColorIcons/volleyball.png"
        }
    ];

    /*Function to navigate to sports list screen*/
    $scope.clickSport = function (sport) {

        $location.path('/home/sportsCategoryFilter/' + sport.id);
    }
    /*Function to navigate to sports list screen*/
    $scope.clickCategory = function (category) {

        $location.path('/home/sportsCategoryFilter/' + category.id);
    }
}]);
