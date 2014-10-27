var app=angular.module('store',[]);
app.controller('GetController',function($scope,$http){
 $http({
	   method:'POST',
	   url:'http://localhost:8080/Get_Data.php',
	   headers:{'Content-Type':'text/plain'} 
	   })
 .success(function(status,data,headers)
       {
	    $scope.get=data;
		console.log(data);
		console.log(status);
	   })
 .error(function(status,headers)
       {
	    console.log(status);
	   })
});