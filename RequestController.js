/////////////////////////GET Method///////////////////////////////////////////// 
app.controller('RequestController',function($scope,$http){
 $http({
	   method:'GET',
	   url:'http://localhost:8080/GitHub/ACL/Get_Data.php',
	   headers:{'Content-Type':'text/plain'} 
	   })
 .success(function(data,status)
       {
	    $scope.get=data;
		console.log(data);
		console.log(status);
	   })
 .error(function(status,headers)
       {
	    console.log(status);
	   })
//////////////////////////POST Method/////////////////////////////////////////////////
$scope.users=true;
$scope.roles=false;
$scope.features=false;

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
   data:{'role_id':$scope.role_id,'role_name':$scope.role_name,'role_purpose':$scope.role_purpose},
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
   url:'http://localhost:8080/GitHub/ACL/Post_Role_Features_Data.php',
   data:{'role_id':$scope.role_id,'features_name':this.features_name},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   document.getElementById("role_features").innerHTML=data;
   console.log(data);
   console.log(status);
  })
  .error(function(status){
   document.getElementById("role_features").innerHTML="Failed";
   console.log(status);
  })
 }
//Method for Role Users data
 $scope.role_users_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/GitHub/ACL/Post_Role_Users_Data.php',
   data:{'role_id':$scope.role_id,'user_name':this.user_name},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   document.getElementById("role_user").innerHTML=data;
   console.log(data);
   console.log(status);
  })
  .error(function(status){
	  document.getElementById("role_user").innerHTML="Failed";
   console.log(status);
  })
 }
////////////////////////// Update Method /////////////////////////////////////
//Initialization Table Display
$scope.user_enable=true;
$scope.user_toggle=false;
$scope.role_enable=true;
$scope.role_toggle=false;
$scope.feature_enable=true;
$scope.feature_toggle=false;
$scope.users_table=true;
$scope.roles_table=false;
$scope.features_table=false;
//Reset Data in Roles.html Page
$scope.reset_data=function(){
 $scope.user_name='';
 $scope.features_name='';
 $scope.role_id='';
 document.getElementById("role_features").innerHTML="";
 document.getElementById("role_user").innerHTML="";
 document.getElementById("status").innerHTML="";
}
//Show/Hide User Update Button
$scope.user_check=function(){
 this.user_enable=!this.user_enable;
 this.user_toggle=!this.user_toggle;
}
//Show/Hide Role Update Button
$scope.role_check=function(){
 this.role_enable=!this.role_enable;
 this.role_toggle=!this.role_toggle;
}
//Show/Hide Feature Update Button
$scope.feature_check=function(){
 this.feature_enable=!this.feature_enable;
 this.feature_toggle=!this.feature_toggle;
}
//Add Dropdown Role Data in Text Box
$scope.role_add=function(){
 $scope.role_id=this.b.role_id;
}
//Add Dropdown Features Data in Text Box
$scope.feature_add=function(){
 $scope.features_name=this.c.features_name;
}
//Add Dropdown User Data in Text Box
$scope.user_add=function(){
 $scope.user_name=this.a.user_name;
}
//Method for Users Table View Display
$scope.users_table_disp=function(){
 $scope.users_table=true;
 $scope.roles_table=false;
 $scope.features_table=false;
}
//Method for Role Table View Display
$scope.roles_table_disp=function(){
 $scope.users_table=false;
 $scope.roles_table=true;
 $scope.features_table=false;
}
//Method for Features Table View Display
$scope.features_table_disp=function(){
 $scope.users_table=false;
 $scope.roles_table=false;
 $scope.features_table=true;
}
//Update User Data
 $scope.update_user_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/GitHub/ACL/Update_User_Data.php',
   data:{'user_name':this.v.user_name,'user_desg':this.v.user_designation,'user_dept':this.v.user_department,'user_joined':this.v.user_joined},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   document.getElementById("status").innerHTML=data;
   console.log(data);
   console.log(status);
  })
  .error(function(status){
   document.getElementById("status").innerHTML="Failed";
   console.log(status);
  })
 }
//Update Role Data
$scope.update_role_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/GitHub/ACL/Update_Role_Data.php',
   data:{'role_id':this.w.role_id,'role_name':this.w.role_name,'role_purpose':this.w.role_purpose},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   document.getElementById("status").innerHTML=data;
   console.log(data);
   console.log(status);
  })
  .error(function(status){
   document.getElementById("status").innerHTML="Failed";
   console.log(status);
  })
 }
//Update Feature Data
 $scope.update_feature_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/GitHub/ACL/Update_Feature_Data.php',
   data:{'features_name':this.x.features_name,'features_descr':this.x.features_descr,'features_perm':this.x.features_perm},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   document.getElementById("status").innerHTML=data;
   console.log(data);
   console.log(status);
  })
  .error(function(status){
   document.getElementById("status").innerHTML="Failed";
   console.log(status);
  })
 }
});