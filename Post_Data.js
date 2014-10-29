//Declaring Module
var app=angular.module('store',[]);
//Declaring Controller as PostController
app.controller('PostController',function($scope,$http){
$scope.users=true;
$scope.roles=false;
$scope.features=false;
//Date Function Format YYYY-MM-DD
 var d=new Date();
 $scope.user_joined=d.getFullYear()+"-"+d.getMonth()+"-"+d.getDate();
//Method for Resetting Users Form Fields
 $scope.reset_users_data=function(){
  $scope.user_name='';
  $scope.user_designation='';
  $scope.user_department='';
  $scope.user_joined='';
  document.getElementById("users").innerHTML='';
 }
//Method for Users Form Display
$scope.users_disp=function(){
 $scope.users=true;
 $scope.roles=false;
 $scope.features=false;
}
//Method for Post Users Data  
 $scope.post_users_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/GitHub/ACL/Post_Users_Data.php',
   data:{'user_name':$scope.user_name,'user_designation':$scope.user_designation,'user_department':$scope.user_department,'user_joined':$scope.user_joined},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   console.log(data);
   console.log(status);
   document.getElementById("users").innerHTML=data;
  })
  .error(function(status){
   console.log(status);
   document.getElementById("users").innerHTML="Failed";
  })
 }
//Method for Resetting Roles Form Fields
 $scope.reset_roles_data=function(){
  $scope.role_name='';
  $scope.role_purpose='';
  document.getElementById("roles").innerHTML='';
 }
//Method for Roles Form Display
$scope.roles_disp=function(){
 $scope.users=false;
 $scope.roles=true;
 $scope.features=false;
}
//Method for Post Roles Data
 $scope.post_roles_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/GitHub/ACL/Post_Roles_Data.php',
   data:{'role_name':$scope.role_name,'role_purpose':$scope.role_purpose},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   console.log(data);
   console.log(status);
   document.getElementById("roles").innerHTML=data;
  })
  .error(function(status){
   console.log(status);
   document.getElementById("roles").innerHTML="Failed";
  })
 }
//Method for Resetting Features Form Fields
 $scope.reset_features_data=function(){
  $scope.features_name='';
  $scope.features_descr='';
  $scope.features_perm='';
  document.getElementById("features").innerHTML='';
 }
//Method for Features Form Display
$scope.features_disp=function(){
 $scope.users=false;
 $scope.roles=false;
 $scope.features=true;
}
//Method for Post Features Data 
 $scope.post_features_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/GitHub/ACL/Post_Features_Data.php',
   data:{'features_name':$scope.features_name,'features_descr':$scope.features_descr,'features_perm':$scope.features_perm},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   console.log(data);
   console.log(status);
   document.getElementById("features").innerHTML=data;
  })
  .error(function(status){
   console.log(status);
   document.getElementById("features").innerHTML="Failed";
  })
 }
//Method for Role Features Data
 $scope.role_features_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/GitHub/ACL/Role_Features_Data.php',
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
   url:'http://localhost:8080/GitHub/ACL/Role_Users_Data.php',
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