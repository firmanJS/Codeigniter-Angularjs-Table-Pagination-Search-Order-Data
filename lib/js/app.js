//initial the modul angular see in view ng-app
var app = angular.module("UjianApp", ['ui.bootstrap']);
//filter custom for to the view
app.filter('startFrom', function() {
  return function(input, start) {
    if(input) {
        start = +start; //parse to int
        return input.slice(start);
      }
    return [];
  }
});
app.controller('UjianCtrl',function ($scope,$http) {
  //initial data
  $scope.data_json = function () {
    //get data request,With Get or Post
    $http.get('home/get_data').then(function(res)
    {
      //set condition if response code 200
      if(res.data && res.data.code == 200)
      {
        $scope.pagedItems =  res.data.response; //initial the data response
        $scope.currentPage = 1; //initial first page for pagination
        $scope.entryLimit = 10; //initial limit per page
        $scope.filteredItems = $scope.pagedItems.length; //initial filter data
        $scope.totalItems = $scope.pagedItems.length; //initial total data
      }
    });
  };
});
