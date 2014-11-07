/////////////////////////GET Method///////////////////////////////////////////// 
app.controller('LoginController',function($scope,$http){
$scope.login=true;
$scope.access=false;
 $http({
	   method:'GET',
	   url:'http://localhost:8080/GitHub/ACL/Login.php',
	   headers:{'Content-Type':'text/plain'} 
      }).success(function(data,status)
       {
	    $scope.get=data;
		console.log(data);
		console.log(status);
	   }).error(function(status,headers)
       {
	    console.log(status);
	   });
//Checking UserName and Password 
 $scope.check_data=function()
  {
    for(var i=0;i<=$scope.get.role_users.length;i++)
	  {
	   if(($scope.user_name===$scope.get.role_users[i]['user_name'])&&($scope.pass_word===$scope.get.role_users[i]['role_id']))
	   {
	     if($scope.pass_word==='ROLE1')
		 {
		  $scope.login=false;
		  $scope.access=true;
		  $scope.full=true;
		  break;
		 }
		 else if($scope.pass_word==='ROLE2')
		 {
		  $scope.login=false;
		  $scope.access=true;
		  $scope.maximum=true;
		  break;
		 }
		 else if($scope.pass_word==='ROLE3')
		 {
		  $scope.login=false;
		  $scope.access=true;
		  $scope.minimum=true;
		  break;
		 }
	   }
	   else
	   {
	    document.getElementById("error").innerHTML="Enter Correct Data";
	   }
	 }
  }
//Reset Button  
 $scope.reset_data=function()
  {
   $scope.user_name='';
   $scope.pass_word='';
  }
//Logout Button
 $scope.log_out=function()
  {
   $scope.user_name='';
   $scope.pass_word='';
   $scope.login=true;
   $scope.access=false;
   $scope.full=false;
   $scope.maximum=false;
   $scope.minimum=false;
   document.getElementById("error").innerHTML="";
  } 
});