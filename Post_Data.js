//Declaring Module
var app=angular.module('store',[]);
//Declaring Controller as PostController
app.controller('PostContoller',function($scope,$http){
//Method for Post Users Data 
 $scope.post_users_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/post_users_data',
   data:{'user_name':$scope.user_name,'user_designation':$scope.user_designation,'user_department':$scope.user_department,'user_joined':$scope.user_joined},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   console.log(data);
   console.log(status);
  })
  .error(function(status){
   console.log(status);
  })
 }
//Method for Post Roles Data
 $scope.post_roles_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/post_roles_data',
   data:{'role_name':$scope.role_name,'role_purpose':$scope.role_purpose},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   console.log(data);
   console.log(status);
  })
  .error(function(status){
   console.log(status);
  })
 }
//Method for Post Features Data 
 $scope.post_features_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/post_features_data',
   data:{'features_name':$scope.features_name,'features_descr':$scope.features_descr,'features_perm':$scope.features_perm},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   console.log(data);
   console.log(status);
  })
  .error(function(status){
   console.log(status);
  })
 }
//Method for Role Features Data
 $scope.role_features_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/role_features_data',
   data:{'role_id':$scope.role_id,'features_id':$scope.features_id},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   console.log(data);
   console.log(status);
  })
  .error(function(status){
   console.log(status);
  })
 }
//Method for Role Users data
 $scope.role_users_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/role_users_data',
   data:{'role_id':$scope.role_id,'user_id':$scope.user_id},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   console.log(data);
   console.log(status);
  })
  .error(function(status){
   console.log(status);
  })
 }
});