var app = angular.module('GroupListApp', ['ui.bootstrap', 'ngResource']);

app.controller('GroupListController', function ($scope, $http) {
    $scope.showLoader = true;
    $http.get('getGroupslist.php').then(function (d) {
        $scope.lst = d.data;
        $scope.totalItems = $scope.lst.length;
        $scope.currentPage = 1;
        $scope.numPerPage = 5;

        $scope.paginate = function (value) {
            var begin, end, index;
            begin = ($scope.currentPage - 1) * $scope.numPerPage;
            end = begin + $scope.numPerPage;
            index = $scope.lst.indexOf(value);
            return (begin <= index && index < end);
        };

        $scope.showLoader = false;

    }, function (error) {

        alert('failed to load users list');

    });

});