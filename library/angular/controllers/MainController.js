// Code goes here
(function () {

    var app = angular.module("benson", ['ngSanitize', 'ngAnimate']);

    var MainController = function ($scope, wpjson) {

      var onDataComplete = function(data){
        $scope.data = data;
        $scope.spinner = false;
      }

      var onError = function (response) {
        $scope.error = 'Could not fetch data because "' + response + '"';
      };


      var sortbyTitle = function(){
        $scope.resourceSortOrder = "+title";
        $scope.sortbyTitleActive = 'active';
        $scope.sortbyPriorityActive = '';
      };

      var sortbyPriority = function(){
        $scope.resourceSortOrder = "+meta.priority";
        $scope.sortbyTitleActive = '';
        $scope.sortbyPriorityActive = 'active';
      };


      wpjson.getData().then(onDataComplete, onError);

      $scope.sortbyPriorityActive = 'active';
      $scope.spinner = true;
      $scope.resourceSortOrder = "+meta.priority";
      $scope.sortbyTitle = sortbyTitle;
      $scope.sortbyPriority = sortbyPriority;
    };

    

    app.controller("MainController", ["$scope", "wpjson", MainController]);

}());