// Code goes here
(function () {

    var app = angular.module("benson", ['ngSanitize', 'ngOrderObjectBy']);

    var MainController = function ($scope, wpjson) {

      var onDataComplete = function(data){
        $scope.data = data;
      }

      var onError = function (response) {
        $scope.error = 'Could not fetch data because "' + response + '"';
      };

      var sortbyTitleOrder = true;
      var sortbyPriorityOrder = true;

      var sortbyTitle = function(data){
        if ( sortbyTitleOrder ) {
          $scope.resourceSortOrder = "+title";
          sortbyTitleOrder = false;

        } else {
          $scope.resourceSortOrder = "-title";
          sortbyTitleOrder = true;

        }
      };

      var sortbyPriority = function(){
        if ( sortbyPriorityOrder ) {
          $scope.resourceSortOrder = "+meta.priority";
          sortbyPriorityOrder = false;
        } else {
          $scope.resourceSortOrder = "-meta.priority";
          sortbyPriorityOrder = true;
        }
      };


      wpjson.getData().then(onDataComplete, onError);

      $scope.resourceSortOrder = "+title";
      $scope.sortbyTitle = sortbyTitle;
      $scope.sortbyPriority = sortbyPriority;
    };

    

    app.controller("MainController", ["$scope", "wpjson", MainController]);

}());