//Declaring Controller as PostController
var app=angular.module('store',[]);
app.controller('RequestController',function($scope,$http){
//Method for Resetting Users Form Fields
 $scope.reset_app_data=function(){
   $scope.Config_Type='';
   $scope.Config_Code='';
   $scope.Config_Desc='';
  document.getElementById("app").innerHTML='';
 }
//Method for Post App Data  
 $scope.post_app_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/GitHub/ACL/App_Access.php',
   data:{'Config_Type':$scope.Config_Type,'Config_Code':$scope.Config_Code,'Config_Desc':$scope.Config_Desc},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   console.log(data);
   console.log(status);
   document.getElementById("app").innerHTML=data;
  })
  .error(function(status){
   console.log(status);
   document.getElementById("app").innerHTML="Failed";
  })
 }
});