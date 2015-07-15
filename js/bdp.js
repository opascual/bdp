var bdpApp = angular.module('bdpApp', []);

var players = [
    {
        id: 1,
        name: 'Edu',
        surname: 'Ortega Carrión',
        nif: '46358501T',
        club_name: 'UESC'
    },
    {
        id: 2,
        name: 'Bernat',
        surname: 'de Pablo Márquez',
        nif: '123456789T',
        club_name: 'EPSA'
    },
    {
        id: 3,
        name: 'Mireia',
        surname: 'Bernadó Figuerola',
        nif: '123456789P',
        club_name: 'Sferic de Terrassa'
    },
    {
        id: 4,
        name: 'Nacho',
        surname: 'Mayol Ortí',
        nif: '456456456W',
        club_name: 'UESC'
    }
];



/**
 *	Home controller
 */
bdpApp.controller('HomeController', function() {


});

/**
 *	Seasons controller
 */
bdpApp.controller('SeasonsController', function($scope) {
    /*
     $scope.seasonTable = [
     { seasons: 2015, clubs: 123, checkups: 456 },
     { seasons: 2014, clubs: 99, checkups: 456 },
     { seasons: 2015, clubs: 1, checkups: 456 },
     ];
     */
    /*var expected = [
     { seasons: 2015, clubs: 123, checkups: 456 },
     { seasons: 2014, clubs: 99, checkups: 456 },
     { seasons: 2015, clubs: 1, checkups: 456 },
     ]
     
     console.log('expected: ', expected)
     
     $scope.seasonTable = array_seasons;
     */
    $scope.seasonTable = sqlObj;
    console.log('$scope.seasonTable: ', $scope.seasonTable);


});


/**
 *	Add Season controller
 */
bdpApp.controller('AddSeasonController', function($scope) {
    $scope.newSeasonObj = [
        {id: 2016},
        {id: 2017},
        {id: 2018},
        {id: 2019},
        {id: 2020}
    ];
});


/**
 *	Players controller
 */
bdpApp.controller('PlayersController', function($scope) {

    //$scope.playersArray = players;

    $scope.reverse = false;
    $scope.predicate = 'surname';

    $scope.playersArray = sqlObj;
});


/**
 *	Players controller
 */
bdpApp.controller('AddPlayerController', function($scope) {

    /*$scope.player = {
     nif: '46358501T',
     surname: 'Ortega Carrión',
     name: 'Eduard',
     birthDate: '21/05/1983'
     };
     
     $scope.anthropometry = [
     {
     season: 2015,
     height: 195,
     weight: 84,
     morphology: 'lorem ipsum'
     },
     {
     season: 2014,
     height: 192,
     weight: 105,
     morphology: 'dolor sit amet'
     }
     ];
     
     $scope.checkups = [
     { 
     season: 2015,
     club: 'UESC',
     checkup: {
     id: 1234,
     url: 'www.uesc.com'
     },
     file_url: 'www.uesc.com/checkup'
     },
     { 
     season: 2014,
     club: 'Sant Jordi',
     checkup: {
     id: 1236,
     url: 'www.dummy.com'
     },
     file_url: 'www.dummy.com/checkup'
     }
     ];*/

});


/**
 *	Clubs controller
 */
bdpApp.controller('ClubsController', function($scope) {

    $scope.reverse = false;
    $scope.predicate = 'name';

    /*
     $scope.clubsArray = [
     { id: 1, name: 'UESC', file_url: 'http://bernatdepablo.cat/img/logos/uesc.jpg'},
     { id: 2, name: 'CEB Sant Jordi', file_url: 'http://bernatdepablo.cat/img/logos/santjordi.jpg'},
     { id: 3, name: 'Sferic Terrassa', file_url: 'http://bernatdepablo.cat/img/logos/sferic.jpg'},
     { id: 4, name: 'CB Sant Pere Terrassa', file_url: 'http://bernatdepablo.cat/img/logos/santpere.jpg'}
     
     ];
     */

    $scope.clubsArray = sqlObj;

});


/**
 *	Clubs controller
 */
bdpApp.controller('AddClubController', function($scope) {

    // Crear
    /*$scope.club = {
     id: null,
     name: '',
     sports: [],
     file_url: ''
     };
     */

    //Editar
    /*
     $scope.club = { 
     id: 123,
     name: 'Sferic Terrassa',
     sports: [],
     file_url: 'http://bernatdepablo.cat/img/logos/sferic.jpg'
     };
     */

    $scope.sportsObj = sqlObj;

    $scope.addSport = function() {

        for (var i = 0; i < $scope.sportsObj.length; i++) {
            if ($scope.sports == $scope.sportsObj[i].id) {
                $scope.club.sports.push($scope.sportsObj[i]);
                $scope.sportsToAdd.push($scope.sportsObj[i].id);
            }
        }

        /*
         if($scope.sports) {
         if($scope.club.sports.indexOf($scope.sports.id) < 0)	{
         $scope.club.sports.push($scope.sports.name);
         }
         }
         */
    }

    $scope.removeSport = function(item) {
        var index = $scope.club.sports.indexOf(item);
        $scope.club.sports.splice(index, 1);
    }


    $scope.executeAddClub = function() {
        console.log('--- execute ---')
        console.log('scope.club: ', $scope.club)

    }

});


/**
 *	Sports controller
 */
bdpApp.controller('SportsController', function($scope) {

    /*
     $scope.sportsObj = [
     { name: 'Handbol', num_clubs: 12 },
     { name: 'Futbol', num_clubs: 2 },
     { name: 'Basquet', num_clubs: 122 },
     ];
     */
    $scope.deleteSport = function(item) {
        console.log('item a eliminar: ', item);
    }

    $scope.sportsObj = sqlObj;



});


/**
 *	Add Sport controller
 */
bdpApp.controller('AddSportController', function($scope) {
    $scope.sports = ['Basquet', 'Handbol'];
    $scope.new_sport = sqlObj;
    console.log($scope.new_sport);
});


/**
 *	Checkups controller
 */
bdpApp.controller('CheckupsController', function($scope) {

    $scope.checkupsObj = [
        {
            season: 2015,
            data: [
                {club_name: 'UESC', club_id: 123, players: 123},
                {club_name: 'Sferic Terrassa', club_id: 456, players: 456},
                {club_name: 'Sant Pere Terrassa', club_id: 789, players: 789},
                {club_name: 'QBasket', club_id: 666, players: 11}
            ]
        },
        {
            season: 2014,
            data: [
                {club_name: 'UESC', club_id: 123, players: 12},
                {club_name: 'Sferic Terrassa', club_id: 456, players: 34},
                {club_name: 'Sant Pere Terrassa', club_id: 789, players: 56},
            ]
        },
    ];

    $scope.reverse = false;
    $scope.seasons = $scope.checkupsObj[0];
    $scope.checkupsTable = $scope.checkupsObj[0].data;

    $scope.changeSeason = function(item) {
        for (i = 0; i < $scope.checkupsObj.length; i++) {
            if ($scope.checkupsObj[i].season == item) {
                $scope.checkupsTable = $scope.checkupsObj[i].data;
            }
        }
    }
});


/**
 *	Checkups Club controller
 */
bdpApp.controller('CheckupsClubController', function($scope) {

    $scope.checkupsObj = [
        {
            season: 2015,
            data: [
                {player_name: 'Eduard Ortega Carrión', player_id: 123, player_category: 'Senior A', checkup_id: 123},
                {player_name: 'Bernat de Pablo Márquez', player_id: 456, player_category: 'Senior B', checkup_id: 456},
                {player_name: 'Mireia Bernadó Figuerola', player_id: 789, player_category: 'Júnior', checkup_id: 789},
                {player_name: 'Nacho Mayol Ortí', player_id: 666, player_category: 'Cadet', checkup_id: 666}
            ]
        },
        {
            season: 2014,
            data: [
                {player_name: 'Eduard Ortega Carrión', player_id: 123, player_category: 'Júnioe', checkup_id: 1},
                {player_name: 'Bernat de Pablo Márquez', player_id: 456, player_category: 'Senior B', checkup_id: 2},
                {player_name: 'Nacho Mayol Ortí', player_id: 666, player_category: 'Infantil', checkup_id: 3}
            ]
        },
    ];

    $scope.reverse = false;
    $scope.seasons = $scope.checkupsObj[0];
    $scope.checkupsTable = $scope.checkupsObj[0].data;

    $scope.changeSeason = function(item) {
        for (i = 0; i < $scope.checkupsObj.length; i++) {
            if ($scope.checkupsObj[i].season == item) {
                $scope.checkupsTable = $scope.checkupsObj[i].data;
            }
        }
    }

});


/**
 *	Add Checkup controller
 */
bdpApp.controller('AddCheckupController', function($scope) {

    //$scope.checkup.player.anthropometry.imc = $scope.checkup.player.anthropometry.weight / ($scope.checkup.player.anthropometry.height * $scope.checkup.player.anthropometry.height)) * 10000;
});
